<?php

namespace App;


class View
{

    use Magic;

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

}