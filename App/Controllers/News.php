<?php

namespace App\Controllers;

use \App\View;
use \App\Models\News as Article; // устранение конфликта имен

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
        $this->view->news = Article::lastNews();
        $this->view->display(__DIR__ . '/../views/news/lastNews.php');
    }

    /**
     * Метод-экшн, для вывода одной новости по id,
     * пришедшему от пользователя
     */
    protected function actionOne()
    {
        if(!empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->view->article = Article::findById($id);
            $this->view->display(__DIR__ . '/../views/news/oneNews.php');
        } else {
            header('Location: /');
            exit;
        }
    }

    /**
     * Метод-экшн, для вывода всех новостей
     */
    protected function actionAll()
    {
        $this->view->news = Article::findAllDesc();
        $this->view->display(__DIR__ . '/../views/news/allNews.php');
    }

    /**
     * Метод-экшн, добавляющий новую новость,
     * если заполнены все поля формы
     */
    protected function actionAdd()
    {
        if (!empty($_POST['title']) &&
            !empty($_POST['text']) &&
            !empty($_POST['author_id'])) {
                $this->view->news = new Article();
                $this->view->news->title     = $_POST['title'];
                $this->view->news->text      = $_POST['text'];
                $this->view->news->author_id = $_POST['author_id'];
                $this->view->news->save();
                header('Location: /');
                exit;
        } else {
            $this->view->display(__DIR__ . '/../views/news/add.php');
        }
    }

    /**
     * Метод-экшн, получающий одну новость по id
     * пришедшему от пользователя,
     * для редактирования/удаления
     *
     */
    protected function actionAdmin()
    {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->view->article = Article::findById($id);
            $this->view->display(__DIR__ . '/../views/news/admin.php');
        } else {
            header('Location: /');
            exit;
        }
    }

}