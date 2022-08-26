<?php 

namespace App\Http\Controllers;

use App\Http\Response;

class HomeController 
{
    public function index()
    {
        // La funcion view() viene del archivo app/helpers.php
        // Puede ser usada aqui porque el archivo helpers fue configurado en el archivo composer.json
        return view('home');
    }
}

