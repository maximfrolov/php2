<?php

namespace App\Controllers;

use App\Controller;
use \App\Models\News;

/**
 * Class NewsController Контроллер новостей
 * @package App\Controllers
 */
class NewsController
    extends Controller
{

    /**
     * Метод-экшн, для вывода последних новостей.
     */
    protected function actionIndex()
    {
        $this->view->news = News::lastNews();
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
            $this->view->article = News::findById($id);
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
        $this->view->news = News::findAllDesc();
        $this->view->display(__DIR__ . '/../views/news/allNews.php');
    }

}