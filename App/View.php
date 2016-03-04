<?php

namespace App;

/**
 * Class View
 * @package App
 */
class View
    implements \Countable
{

    use TMagic;

    /**
     * Закрытое свойство, хранит в себе
     * объект класса Twig_Environment
     * @property \Twig_Environment
     */
    private $context;

    /**
     * View constructor.
     * Метод-конструктор создает контекст
     * (объект класса Twig_Environment)
     * для хранения данных.
     */
    public function __construct()
    {
        $templates = new \Twig_Loader_Filesystem(__DIR__ . '/views/news');
        $this->context = new \Twig_Environment($templates, [
            'cache' => false,
        ]);
    }

    /**
     * Метод возвращающий строку
     * вывода памяти и времени страницы.
     * @return string
     */
    public function getTimer()
    {
        return \PHP_Timer::resourceUsage();
    }

    /**
     * Метод загружает шаблон $template из среды $context,
     * возвращает его в виде экземпляра Twig_template,
     * передает в него данные $param для отображения.
     * @param $template
     * @param array $param
     */
    public function renderContext($template, $param = [])
    {
        echo $this->context->loadTemplate($template)->render($param);
    }

    /**
     * Метод, возвращающий подготовленный для показа шаблон
     * @param $template string Путь к шаблону
     * @return string Переданный в буфер вывода шаблон
     */
    public function render($template)
    {
        ob_start();
        foreach ($this->data as $prop => $value) {
            $$prop = $value; // $$prop - переменная, чье имя содержится в переменной $prop
        }
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * Метод, показывающий подготовленный шаблон
     * @param $template string Путь к шаблону
     */
    public function display($template)
    {
        echo $this->render($template);
    }

    /**
     * Метод, подсчитывающий число элементов объекта
     * @link http://php.net/manual/en/countable.count.php
     * @return int Число элементов объекта
     */
    public function count()
    {
        return count($this->data);
    }

}