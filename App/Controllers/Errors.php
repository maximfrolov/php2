<?php

namespace App\Controllers;


use App\Controller;

/**
 * Class Errors
 * @package App\Controllers
 */
class Errors
    extends Controller
{

    /**
     * Метод-экшн, для вывода сообщения об ошибке 404.
     * @param $e object Переданное исключение
     */
    protected function action404($e)
    {
        $this->view->header = 'Ошибка 404';
        $this->view->error = $e->getMessage();
        $this->view->display(__DIR__ . '/../views/errors/error.php');
    }

    /**
     * Метод-экшн, для вывода сообщения об ошибке БД
     * @param $e object Переданное исключение
     */
    protected function actionErrorDb($e)
    {
        $this->view->header = 'Ошибка БД';
        $this->view->error = $e->getMessage();
        $this->view->display(__DIR__ . '/../views/errors/error.php');
    }
}