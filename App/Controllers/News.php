<?php

namespace App\Controllers;

use App\Controller;
use App\Models\News as article; // устранение конфликта имен

/**
 * Class NewsController Контроллер новостей
 * @package App\Controllers
 */
class News
    extends Controller
{

    /**
     * Метод-экшн, для вывода последних новостей.
     */
    protected function actionIndex()
    {
        $this->view->news = article::lastNews();
        $this->view->display(__DIR__ . '/../views/news/lastNews.php');
    }

    /**
     * Метод-экшн, для вывода одной новости по id,
     * пришедшему от пользователя.
     */
    protected function actionOne()
    {
        if(!empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->view->article = article::findById($id);
            $this->view->display(__DIR__ . '/../views/news/oneNews.php');
        } else {
            $this->redirect('/');
        }
    }

    /**
     * Метод-экшн, для вывода всех новостей.
     */
    protected function actionAll()
    {
        $this->view->news = article::findAllDesc();
        $this->view->display(__DIR__ . '/../views/news/allNews.php');
    }

    /**
     * Метод-экшн, для вывода сообщения об ошибке,
     * в зависимости от типа класса переданного исключения.
     * @param $e object Переданное исключение
     */
    protected function actionError($e)
    {
        switch ($e) {
            case ($e instanceof \App\Exceptions\Error404):
                $this->view->header = 'Ошибка 404';
                break;
            case ($e instanceof \App\Exceptions\Db):
                $this->view->header = 'Ошибка БД';
                break;
        }
        $errorMessage = $e->getMessage();
        $this->view->error = $errorMessage;
        $this->view->display(__DIR__ . '/../views/errors/errorNews.php');
    }

}