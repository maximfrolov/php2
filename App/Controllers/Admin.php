<?php

namespace App\Controllers;

use App\Controller;
use App\Models\News;
use App\MultiException;

/**
 * Class Admin Контроллер админ-панели
 * @package App\Controllers
 */
class Admin
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
            $this->redirect('/admin');
        }
    }

    /**
     * Метод-экшн, показывающий шаблон
     * для добавления новости.
     */
    protected function actionAdd()
    {
        $this->view->display(__DIR__ . '/../views/admin/add.php');
    }

    /**
     * Метод-экшн, получающий одну новость по id
     * пришедшему от пользователя,
     * для редактирования/удаления.
     *
     */
    protected function actionEdit()
    {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->view->article = News::findById($id);
            $this->view->display(__DIR__ . '/../views/admin/edit.php');
        } else {
            $this->redirect('/admin');
        }
    }

    /**
     * Метод, получающий данные из фомы редактирования новости
     * и сохраняющий новость в базу данных.
     */
    protected function actionUpdate()
    {
            $id = $_POST['id'];
            try {
                $article = News::findById($id);
                $article->fill($_POST)->save;
                $this->redirect('/admin');

            } catch (MultiException $e) {

                $this->view->errors = $e;
            }
        $this->view->display(__DIR__ . '/../views/admin/create.php');
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
            $this->redirect('/admin');
        } else {
            $this->view->display(__DIR__ . '/../views/admin/edit.php');
        }
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
        $this->view->display(__DIR__ . '/../views/errors/errorAdmin.php');
    }

    /**
     * Метод-экшн, создающий новую новость
     */
    protected function actionCreate()
    {

        try {
            $article = new News();
            $article->fill($_POST)->save();
            $this->redirect('/admin');

        } catch (MultiException $e) {

            $this->view->errors = $e;

        }
        $this->view->display(__DIR__ . '/../views/admin/create.php');
    }

}