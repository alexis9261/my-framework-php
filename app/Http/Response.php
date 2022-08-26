<?php 

namespace App\Http;

class Response 
{
    protected $view; // html, array, json, pdf ....

    public function __construct($view)
    {
        $this->view = $view; // home, contact
    }

    public function getView()
    {
        return $this->view;
    }

    public function send()
    {
        $view = $this->getView();

        // Esta variable sera usada en el archivo layout.php
        $content = file_get_contents( viewPath($view) );

        // la funcion viewPath() viene del archivo app/helpers.php
        require viewPath('layout');
    }

}
