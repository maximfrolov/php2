<?php

namespace App\Models;

use App\Model;

/**
 * Class Author Модель авторов новостей
 * @package App\Models
 */
class Author
    extends Model
{

    /**
     * Константа класса - имя таблицы в БД
     */
    const TABLE = 'authors';

    /**
     * @property string Имя автора новости
     */
    public $name;

}