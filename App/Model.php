<?php

namespace App;

/**
 * Class Model Абстрактная модель
 * @package App
 */
abstract class Model
{

    /**
     * Константа класса - имя таблицы в БД.
     */
    const TABLE = '';

    /**
     * @property $id integer id объекта модели
     * @property $reqProp array Массив требуемых полей модели
     */
    public $id;
    protected static $reqProp = [];

    /**
     * Метод для нахождения всех объектов модели.
     * @return array Массив объектов
     */
    public static function findAll()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    /**
     * Метод для нахождения одного объекта модели.
     * @param $id integer id объекта модели
     * @return object Один объект модели
     * @throws object Исключение класса Error404
     */
    public static function findById($id)
    {
        $db = Db::instance();
        $res = $db->query(
            'SELECT * FROM ' . static::TABLE .
            ' WHERE id=:id',
            static::class,
            [':id' => $id]
        );
        if (!empty($res)){
            return $res[0];
        }
        return false;

    }

    /**
     * Метод проверяющий, новый объект или нет.
     * @return bool
     */
    protected function isNew()
    {
        return empty($this->id);
    }

    /**
     * Метод, сохраняющий новый объект в БД.
     */
    protected function insert()
    {

        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':'. $k] = $v;
        }

        $sql = '
            INSERT INTO ' . static::TABLE . '
            (' . implode(',', $columns) . ')
            VALUES
            (' . implode(',', array_keys($values)) . ')
        ';
        $db = Db::instance();
        $db->execute($sql, $values);
        $this->id = $db->getLastInsertId();
    }

    /**
     * Метод, удаляющий объект из БД.
     */
    public function delete()
    {
        $values[':id'] = $this->id;
        $sql = '
            DELETE FROM ' . static::TABLE . '
            WHERE id=:id';
        $db = Db::instance();
        $db->execute($sql, $values);
    }

    /**
     * Метод, изменяющий объект из БД.
     */
    protected function update()
    {
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            $values[':' . $k] = $v;
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k . '=:' . $k;
        }

        $sql = 'UPDATE ' . static::TABLE .
               ' SET ' . implode(',', $columns) .
               ' WHERE id=:id';
        $db = Db::instance();
        $db->execute($sql, $values);
    }

    /**
     * Метод, сохраняющий новый объект в БД,
     * или изменяющий, уже имеющийся в БД.
     */
    public function save()
    {
        if (!$this->isNew()) {
            return $this->update();
        }
        return $this->insert();
    }

    /**
     * Метод, получающий массив данных,
     * заполняющий свойства модели этими данными
     * и возвращающий объект модели .
     * Выбрасывает исключение класса MultiException,
     * в случае некорректности данных.
     *
     * @param $data array Массив данных
     * @return $this object Объект модели
     * @throws $e object Исключение класса MultiException
     */
    public function fill(array $data)
    {
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                if (in_array($key, static::$reqProp)) {
                    $this->{$key} = $value;
                }
            } else {
                if (!isset($e)) {
                    $e = new MultiException();
                }
                $e[] = new \Exception('Некорректный '. $key . '!');
            }
        }
        if (!empty($e)) {
            throw $e;
        }
        return $this;
    }


}