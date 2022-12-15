<?php

namespace App\Router;


use App\Container\Container;
use App\Controllers\LoginController;
use App\Controllers\MiddlewareTest;
use App\Controllers\MiddlewareTest2;
use App\Controllers\NewsController;
use App\Controllers\NewsController2;
use App\Core\HTTPMethod;
use App\Core\Pointer;
use Exception;
use Sunrise\Http\ServerRequest\ServerRequestFactory;

class Router
{

    protected array $routes;

    /**
     * @throws Exception
     */
    public function __construct(Container $container)
    {

        $this->get(link: 'stil',
            controller:[$container->get(MiddlewareTest::class),
                $container->get(MiddlewareTest2::class),
                $container->get(NewsController2::class)],
            method: '__invoke');

        $this->get(link: 'list',
            controller: [$container->get(MiddlewareTest::class),
                $container->get(MiddlewareTest2::class),
                $container->get(NewsController::class) ],
            method: 'list');

        $this->get(link: 'login',
            controller: [
                $container->get(LoginController::class) ],
            method: 'list');

    }


    /**
     * @throws Exception
     */
    public function get(string $link, array $controller, string $method): void
    {
        $this->route(link: $link,
            controller: $controller,
            method: $method,
            HTTPMethod: HTTPMethod::GET);
    }

    /**
     * @throws Exception
     */
    public function post(string $link, array $controller, string $method): void
    {
        $this->route(link: $link,
            controller: $controller,
            method: $method,
            HTTPMethod: HTTPMethod::POST);
    }

    /**
     * Метод для get и post
     * записывает в массив данные для запуска контроллера
     * @throws Exception
     */
    public function route(
        string       $link,
        array $controller,
        string       $method,
        HTTPMethod   $HTTPMethod = HTTPMethod::ANY
    ): void

    {
        $this->routes[$link] = ['controller' => $controller,
            'method' => $method,
            'HTTPMethod' => $HTTPMethod];
    }

    /**
     * Запускает роутер
     * Возвращает  массив [класс контроллера, метод]
     * @throws Exception
     */
    public function start()
    {
        if (!empty($this->routes[$this->getLink()])) {
            return $this->routes[$this->getLink()]['controller'];
        }
        return $this->routes['list']['controller'];
    }

    public function getAction(): Pointer|array
    {
        if (!empty($this->routes[$this->getLink()])) {
            $currentLink = $this->routes[$this->getLink()];
            if ($this->checkHTTPMethod(HTTPMethod: $currentLink['HTTPMethod'])) {
                return new Pointer($currentLink['controller'], $currentLink['method'], $this->getLink());
            }
        }
        return $this->getNameController();
    }

    /**
     * @throws Exception
     */
    public function checkAvailableMethod(string $controller, string $method): bool
    {
        if (class_exists($controller) && method_exists($controller, $method)) {
            return true;
        }
        throw new Exception('Добавление несуществующего контроллера');
    }

    /**
     * Проверяет методы запроса к url
     * @throws Exception
     */
    public function checkHTTPMethod(HTTPMethod $HTTPMethod): bool
    {
        return match ($HTTPMethod) {
            HTTPMethod::GET => !empty($_GET) && empty($_POST),
            HTTPMethod::POST => !empty($_POST),
            HTTPMethod::ANY => !empty($_POST) && !empty($_GET)
        };
    }

    /**
     * Возвращает url
     * @return string
     */
    public function getLink(): string
    {
        $request = new ServerRequestFactory();
        if (!empty($request::fromGlobals()->getQueryParams()['link'])) {
            return $_GET['link'];
        }
        return 'main';
    }

    /**
     * Пытается найти нужный контроллер+метод, если url не задан
     * @throws Exception
     */
    public function getNameController(): Pointer
    {

        $linkArray = explode('/', $this->getLink());
        $controllerName = "App\Controllers\\" . $linkArray[0] . 'Controller';
        if (class_exists($controllerName)) {
            return new Pointer($controllerName, $linkArray[1], [[$controllerName, $linkArray[1]]]);
        } else {
            throw new Exception('Контроллер не найден');
        }
    }

    /**
     * Возвращает массив [контроллер, метод] по url
     * или getNameController()
     * @throws Exception
     */
    public function getController(string $controller, string $method): array
    {
        if (class_exists($controller) && method_exists($controller, $method)) {
            return [$controller, $method];
        }
        return $this->getNameController();
    }

}
