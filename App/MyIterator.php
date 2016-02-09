<?php

namespace App;

/**
 * Class MyIterator реализует интерфейс Iterator
 * @package App
 */
class MyIterator implements \Iterator
{

    /**
     * @var $position int Позиция элемента
     */
    protected $position;

    /**
     * @var $data array|object Защищенное свойство,
     * хранит в себе массив переданных значений,
     * при создании нового объекта класса
     */
    protected $data = [];

    /**
     * MyIterator constructor
     * При создании объекта класса,
     * в конструктор передается массив значений или объект
     * @param $array array|object объект или массив
     */
    public function __construct($array)
    {
        $this->position = 0;
        $this->data = $array;
    }

    /**
     * Метод, осуществляющий доступ к зашищенному свойству
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->data[$this->position];
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return (isset($this->data[$this->position]));
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->position = 0;
    }
}