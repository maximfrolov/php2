<?php

namespace App\Models;

use App\Db;

class User
{
    const TABLE = 'users';

    public $name;
    public $email;

    public static function findAll()
    {
        $db = new Db();
        return $db->query(
            'SELECT * FROM ' . self::TABLE,
            self::class
        );
    }
}