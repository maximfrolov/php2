<?php

namespace App;


class View
{

    use Magic;

    /**
     * @param $template string Путь к шаблону
     */
    public function display($template)
    {
        include $template;
    }
}