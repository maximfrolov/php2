<?php

namespace App;


class View
{

    use Magic;

    public function display($template)
    {
        include $template;
    }
}