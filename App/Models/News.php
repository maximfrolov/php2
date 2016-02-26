<?php

namespace App\Models;

use App\Model;
use App\Db;

/**
 * Class News Модель новостей
 * @package App\Models
 *
 * @property \App\Models\Author $author
 */
class News
    extends Model
{

    /**
     * Константа класса - имя таблицы в БД
     */
    const TABLE = 'news';

    /**
     * @property $title string Заголовок новости
     * @property $text string Текст новости
     * @property $author_id integer id автора новости
     * @property $reqProp array Массив требуемых полей модели
     */
    public $title;
    public $text;
    public $author_id;
    protected static $reqProp = [
        'title',
        'text',
        'author_id',
    ];

    /**
     * Метод нахождения последних 3-х новостей
     * @return array Массив объектов
     */
    public static function lastNews()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . self::TABLE .
            ' ORDER BY id DESC LIMIT 3',
            self::class
        );
    }

    /**
     * Метод нахождения всех новостей и сортировки их
     * в обратном порядке, по добавлению в БД
     * @return array Массив объектов
     */
    public static function findAllDesc()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . self::TABLE .
            ' ORDER BY id DESC',
            self::class
        );

    }

    /**
     * Магический метод  __isset();
     * проверяет установлено ли недоступное свойство
     * по заданному ключу
     * @param $k string Имя недоступного свойства
     * @return bool
     */
    public function __isset($k)
    {

        switch ($k) {
            case 'author':
                return !empty($this->author_id);
                break;
            default:
                return false;
        }
    }

    /**
     * LAZY LOAD
     *
     * Магический метод __get();
     * проверяет на пустоту поле author_id,
     * при запросе поля author
     *
     * @param $k string Имя недоступного свойства
     * @return object|null Вернет объект класса Author или null
     */
    public function __get($k)
    {

        switch ($k) {
            case 'author':
                return Author::findById($this->author_id);
                break;
            default:
                return null;
        }
    }

}