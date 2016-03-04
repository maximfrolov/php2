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
        $news = article::lastNews();
        $this->view->renderContext('lastNews.html', [
            'news' => $news,
            'resources' => $this->view->getTimer(),
        ]);
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
        if (!empty($article = article::findById($_GET['id']))) {
            $this->view->renderContext('oneNews.html', [
                'article' => $article,
                'resources' => $this->view->getTimer(),
            ]);
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
        $news = article::findAllDesc();
        $this->view->renderContext('allNews.html', [
            'news' => $news,
            'resources' => $this->view->getTimer(),
        ]);
    }

}