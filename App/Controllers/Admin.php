<?php

namespace App\Controllers;

use App\Controller;
use \App\Models\News;

/**
 * Class AdminController Контроллер админ-панели
 * @package App\Controllers
 */
class AdminController
    extends Controller
{

    /**
     * Метод-экшн, для вывода всех новостей.
     */
    protected function actionIndex()
    {
        $this->view->news = News::findAllDesc();
        $this->view->display(__DIR__ . '/../views/admin/allNews.php');
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
            $this->view->display(__DIR__ . '/../views/admin/oneNews.php');
        } else {
            header('Location: /admin/');
            exit;
        }
    }

    /**
     * Метод-экшн, добавляющий новую новость,
     * если заполнены все поля формы.
     */
    protected function actionAdd()
    {
        if (!empty($_POST['title']) &&
            !empty($_POST['text']) &&
            !empty($_POST['author_id'])) {
            $this->view->news = new News();
            $this->view->news->title     = $_POST['title'];
            $this->view->news->text      = $_POST['text'];
            $this->view->news->author_id = $_POST['author_id'];
            $this->view->news->save();
            header('Location: /admin/');
            exit;
        } else {
            $this->view->display(__DIR__ . '/../views/admin/add.php');
        }
    }

    /**
     * Метод-экшн, получающий одну новость по id
     * пришедшему от пользователя,
     * для редактирования/удаления.
     *
     */
    protected function actionAdmin()
    {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->view->article = News::findById($id);
            $this->view->display(__DIR__ . '/../views/admin/admin.php');
        } else {
            header('Location: /admin/');
            exit;
        }
    }

    /**
     * Метод, получающий данные из фомы редактирования новости
     * и сохраняющий новость в базу данных.
     */
    protected function actionUpdate()
    {
        if (!empty($_POST['title']) &&
            !empty($_POST['text']) &&
            !empty($_POST['author_id']) &&
            !empty($_POST['id'])) {
            $id = $_POST['id'];
            $this->view->article = News::findById($id);
            $this->view->article->title     = $_POST['title'];
            $this->view->article->text      = $_POST['text'];
            $this->view->article->author_id = $_POST['author_id'];
            $this->view->article->save();
            header('Location: /admin/');
            exit;
        }
        $this->view->display(__DIR__ . '/../views/admin/admin.php');
    }

    /**
     * Метод, получающий id новости из формы удаления новости
     * и удаляющий эту новость из базы данных.
     */
    protected function actionDelete()
    {
        if (!empty($_POST['id'])) {
            $id = $_POST['id'];
            $this->view->article = News::findById($id);
            $this->view->article->delete();
            header('Location: /admin/');
            exit;
        } else {
            $this->view->display(__DIR__ . '/../views/admin/admin.php');
        }
    }

}