<?php

class Uploader
{
    protected string $nameOfField;
    protected string $finishPath;
    protected string $uploadName;

    public function __construct($nameOfField,$finishPath,$uploadName)
    {
        $this->nameOfField = $nameOfField;
        $this->finishPath = $finishPath;
        $this->uploadName = $uploadName;

    }

    /**
     * @return bool
     * Проверика загружен ли файл
     */
    function isUploaded(): bool
    {
        if (empty($_FILES)) {
            return false;
        }
        $this->file = $_FILES[$this->nameOfField];
        if (!file_exists($this->file['picture']['tmp_name']) || !is_uploaded_file($this->file['picture']['tmp_name'])) {
            $this->errors['FileNotExists'] = true;
            return false;
        }
        return true;
    }

    /**
     * Получение расширения файла
     * @param $string
     * @return string
     */
    function getExtension($string): string
    {
        $ext = "";
        try {
            $parts = explode(".", $string);
            $ext = strtolower($parts[count($parts) - 1]);
        } catch (Exception $c) {
            $ext = "";
        }
        return $ext;

    }

    /**
     * Создание нового имени файла и загрузка на сервер
     * @param string $fileDirectory
     * @return bool
     */
    function upload(string $fileDirectory): bool
    {


        $result = false;
        $name = $_FILES[$fileDirectory]["name"];

        if (!is_dir($this->finishPath)) {
            if (!$this->sameName) {
                $this->uploadName =  substr(md5(rand(1111, 9999)), 0, 8)  . $this->getExtension($name);
            } else {
                $this->uploadName = $name;
            }
            if (move_uploaded_file($_FILES[$fileDirectory]["tmp_name"], $this->finishPath . $this->uploadName)) {
                $result = true;
            }

        } else {
            $result = false;
        }
        return $result;
    }

    }