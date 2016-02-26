<?php

namespace App;

/**
 * Trait Singleton
 * @package App
 */
trait TSingleton
{

    /**
     * @var object Содержит в себе единственный экземпляр класса
     */
    protected static $instance;

    /**
     *  Защищенный конструктор
     *  Не дает автоматически создать объект класса
     */
    protected function __construct()
    {
    }

    /**
     * Метод, создающий или возвращающий
     * единственный экземпляр класса
     * @return object
     */
    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static;
        }
        return static::$instance;
    }

}