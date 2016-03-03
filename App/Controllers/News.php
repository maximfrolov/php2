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
     * Метод возвращающий строку
     * вывода памяти и времени страницы.
     * @return string
     */
    public function getResources()
    {
        return \PHP_Timer::resourceUsage();
    }

    /**
     * Метод возвращающий контекст
     * (объект класса Twig_Environment)
     * для хранения данных.
     * @return object
     */
    public function getContext()
    {
        $templates = new \Twig_Loader_Filesystem(__DIR__ . '/../views/news');
        return new \Twig_Environment($templates, [
            'cache' => false,
        ]);
    }

    /**
     * Метод-экшн, для вывода последних новостей.
     */
    protected function actionIndex()
    {
        $news = article::lastNews();
        echo $this->getContext()->render('lastNews.html', [
            'news' => $news,
            'resources' => $this->getResources(),
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
            echo $this->getContext()->render('oneNews.html', [
                'article' => $article,
                'resources' => $this->getResources(),
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
        echo $this->getContext()->render('allNews.html', [
            'news' => $news,
            'resources' => $this->getResources(),
        ]);
    }

}