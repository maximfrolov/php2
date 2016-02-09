<?php

namespace App\Models;

use App\Model;

/**
 * Class User Модель пользователей
 * @package App\Models
 */
class User
    extends Model
{
    /**
     * Константа класса - имя таблицы в БД
     */
    const TABLE = 'users';

    /**
     * @property $name string Имя пользователя
     * @property $email string e-mail пользователя
     */
    public $name;
    public $email;

}