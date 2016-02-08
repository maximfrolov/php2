<?php

namespace App;


/**
 * Class Magic Трейт
 * @package App
 */
trait Magic
{
    /**
     * @property array Защищенное свойство
     */
    protected $data = [];

    /**
     * Магический метод __set();
     * добавляет в массив $data недоступное свойство объекта
     * @param $k mixed Имя недоступного свйства
     * @param $v mixed Значение недоступного свойства
     */
    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    /**
     * Магический метод __get();
     * возврвщаяет недоступное свойство объекта,
     * по заданному ключу
     * @param $k mixed Имя недоступного свйства
     */
    public function __get($k)
    {
        return $this->data[$k];
    }

    /**
     * Магический метод __isset();
     * проверяет установлено ли недоступное свойство,
     * по заланному ключу
     * @param $k mixed Имя недоступного свойства
     * @return bool
     */
    public function __isset($k)
    {
        return isset($this->data[$k]);
    }

    /**
     * Магический метод __unset();
     * Удаляет недоступное свойство объекта,
     * по заданному ключу
     * @param $k mixed Имя недоступного свойства
     */
    public function __unset($k)
    {
        unset($this->data[$k]);
    }
}