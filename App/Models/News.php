<?php

namespace App\Models;

use App\Model;
use App\Db;

class News
    extends Model
{

    const TABLE = 'news';

    public $title;
    public $text;
    public $author_id;

    public static function lastNews()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . self::TABLE .
            ' ORDER BY id DESC LIMIT 3',
            self::class
        );
    }

    public static function findAllDesc()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . self::TABLE .
            ' ORDER BY id DESC',
            self::class
        );

    }

    public function __get($k)
    {
        if ('author' == $k && !empty($this->author_id)) {
            return Author::findById($this->author_id);
        }
        return false;
    }

}