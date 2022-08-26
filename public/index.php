<?php 

// Creo la ruta absoluta hasta el archivo autoload.php
require __DIR__ . '/../vendor/autoload.php';

// Front Controller: Centralizar todas las peticiones http en este archivo
// Todas las peticiones deberan pasar por aca.
// instancio la clase que va a procesar las peticiones HTTP
$request = new App\Http\Request;
// Ejecuto el metodo para responder a la peticion
$request->send();