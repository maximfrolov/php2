<?php

namespace App\Controllers;

use \App\View;

/**
 * Class News Контроллер новостей
 * @package App\Controllers
 */
class News
{

    /**
     * @property View object Защищенное свойство
     * хранит в себе объект View();
     */
    protected $view;

    /**
     * News constructor.
     * При создании объекта App\Controllers\News,
     * автоматически создается объект View()
     * и сохраняется в свойство $view.
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Proxy method
     * Метод, получающий имя экшна,
     * выполняющий какие-то действия перед экшном,
     * выполняющий сам экшн.
     * @param $action
     * @return mixed
     */
    public function action($action)
    {
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName();
    }

    /**
     * Метод, который будет вызываться
     * автоматически перед любым экшном.
     */
    protected function beforeAction()
    {
        //echo 'счетчик';
    }

    /**
     * Метод-экшн, для вывода последних новостей.
     */
    protected function actionIndex()
    {
        $this->view->news = \App\Models\News::lastNews();
        $this->view->display(__DIR__ . '/../views/news/lastNews.php');
    }

}