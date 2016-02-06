<?php

namespace App;


class View
{

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function __isset($k)
    {
        return isset($this->data[$k]);
    }

    public function __unset($k)
    {
        unset($this->data[$k]);
    }

    public function display($template)
    {
        include $template;
    }
}