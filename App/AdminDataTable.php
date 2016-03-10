<?php

namespace App;

class AdminDataTable
{
    protected $models;
    protected $functions;
    protected $dataTable;

    public function __construct($models, $functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    public function render()
    {
        foreach ($this->models as $key => $model) {
            foreach ($this->functions as $function) {
                $this->dataTable[$key][] = $function($model);
            }
            yield $this->dataTable[$key];
        }
    }
}