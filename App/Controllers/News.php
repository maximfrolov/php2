<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\Error404;
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
        if (empty($_GET['id'])) {
            $this->redirect('/');
        }
        if (!empty($this->view->article = article::findById($_GET['id']))) {
            $this->view->display(__DIR__ . '/../views/news/oneNews.php');
        } else {
            throw new Error404(
                'Упс..! Ошибка 404. Страница, которую вы искали, не найдена.'
            );
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