<?php

namespace App\Controllers;

use App\Controller;
use \App\Models\News as article; // устранение конфликта имен

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
            header('Location: /');
            exit;
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

}