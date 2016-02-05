<?php

namespace App;

abstract class Model
{
    const TABLE = '';

    public $id;

    public static function findAll()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

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

    protected function isNew()
    {
        return empty($this->id);
    }

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

    public function delete()
    {
        $values[':id'] = $this->id;
        $sql = '
            DELETE FROM ' . static::TABLE . '
            WHERE id=:id';
        $db = Db::instance();
        $db->execute($sql, $values);
    }

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

    public function save()
    {
        if (!$this->isNew()) {
            return $this->update();
        }
        return $this->insert();
    }

}