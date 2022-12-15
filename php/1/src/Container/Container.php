<?php

namespace App\Container;

use http\Exception\InvalidArgumentException;

class Container
{
    private array $definitions = [];
    private array $results = [];

    /**
     * @param $id
     * @return mixed
     * Получение конфигурации по id
     */
    public function get(string $id)
    {
        if(array_key_exists($id, $this->results)){
            return $this->results[$id];
        }

        if (!array_key_exists($id, $this->definitions)) {
            throw new InvalidArgumentException('Не найдено' . $id . ' ');
        }

        $definition = $this->definitions[$id];

        if ($definition instanceof \Closure) {
            $this->results[$id] = $definition($this);
        } else {
            $this->results[$id] = $definition;
        }
        return $this->results[$id];
    }

    /**
     * @param $id
     * @param $value
     * @return void
     * Запись конфигурации по id
     */
    public function set(string $id, $value): void
    {
        if(array_key_exists($id, $this->results)){
            unset($this->results[$id]);
        }
        $this->definitions[$id] = $value;
    }
}