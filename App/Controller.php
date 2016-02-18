<?php

namespace App;

/**
 * Class Controller Класс базового контроллера
 * @package App
 */
abstract class Controller
{

    /**
     * @property View object Защищенное свойство
     * хранит в себе объект View();
     */
    protected $view;

    /**
     * News constructor.
     * При создании объекта класса-наследника App\Controller,
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
     *
     * @param $action string Имя экшна
     * @param $param array Переданный экшну параметр
     * @return mixed вернет результат выполнения экшна
     */
    public function action($action, $param = [])
    {
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName($param);
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
     * Метод, перенаправляющий пользователя по адресу $uri
     * @param $uri string Адрес перенаправления
     */
    protected function redirect($uri)
    {
        header('Location: ' . $uri);
        exit;
    }

}