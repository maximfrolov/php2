<?php

namespace App;

/**
 * Trait TCollection
 * @package App
 */
trait TCollection
{

    /**
     * @var $data array|object Защищенное свойство,
     * хранит в себе массив переданных значений,
     * при создании нового объекта класса
     */
    protected $data = [];

    /**
     * Метод, проверяющий существование элемента
     * в объекте(как в массиве) с заданным ключом.
     * @param mixed $offset Ключ элемента.
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->data[$offset]);
    }

    /**
     * Метод, получающий значение элемента по ключу $offset.
     * @param mixed $offset Ключ элемента.
     * @return mixed|void Значение элемента.
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    /**
     * Метод, устанавливающий значение элементу $value
     * по ключу $offset(если непустой).
     * @param mixed $offset Ключ элемента.
     * @param mixed $value Значение элемента.
     */
    public function offsetSet($offset, $value)
    {
        if ('' == $offset) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    /**
     * Метод, удаляющий элемент по ключу $offset.
     * @param mixed $offset Ключ элемента.
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    /**
     * Метод, возвращающий текущий элемент.
     * @return mixed Может возвращать любой тип.
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * Метод, возвращающий следующий элемент.
     * @return void Любое возвращаемое значение игнорируется.
     */
    public function next()
    {
        next($this->data);
    }

    /**
     * Метод, возвращающий ключ текущего элемента.
     * @return mixed При успехе возвращает scalar, или же NULL при неудаче.
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * Метод, проверяющий корректность текущего элемента
     * @return bool Возвращаемое значение будет приведено
     * к типу boolean и затем использовано.
     * Возвращает TRUE в случае успешного завершения
     * или FALSE в случае возникновения ошибки.
     */
    public function valid()
    {
        return false !== current($this->data);
    }

    /**
     * Метод, возвращающий указатель на первый элемент
     * @return void Любое возвращаемое значение игнорируется.
     */
    public function rewind()
    {
        reset($this->data);
    }

}