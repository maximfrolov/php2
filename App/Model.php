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
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id',
            static::class,
            [':id' => $id]
        );
        if (!empty($res)){
            return $res[0];
        }
        return false;
    }

    public function isNew()
    {
        return empty($this->id);
    }
}