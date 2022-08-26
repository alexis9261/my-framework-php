<?php 

namespace App\Http;

class Request
{
    protected $segments = [];
    protected $controller;
    protected $method;

    public function __construct()
    {
        // Guardo las rutas solicitadas en la URL
        // Al instanciar esta clase en el archivo /public/index.php, 
        // se ejecuta inmediatemente el constructor que toma la URL de la peticion y la procesa.
        $this->segments = explode('/', $_SERVER['REQUEST_URI']);

        $this->setController();
        $this->setMethod();
    }

    public function setController()
    {
        $this->controller = empty( $this->segments[1] )
            ? 'home'
            : $this->segments[1];
    }

    public function setMethod()
    {
        $this->method = empty( $this->segments[2] )
            ? 'index'
            : $this->segments[2];
    }

    public function getController()
    {

        $controller = ucfirst($this->controller);

        // Retorno el controlador, el cual es una clase
        // se esta retornando todo el namespace que apunta a la clase del controlador
        return "App\Http\Controllers\\{$controller}Controller";
    }

    public function getMethod( )
    {
        return $this->method;
    }

    public function send()
    {
        $controller = $this->getController();
        $method     = $this->getMethod();

        $response = call_user_func([
            new $controller, // Instancio la clase del controlador
            $method // Llamo al metodo de la clase
        ]);

        try {
            
            if ($response instanceof Response) {
                // Uso el metodo send() de la clase Responose, porq el controlador retorna una instancia de Response
                $response->send();
            } else {
                throw new \Exception("Error Processing Request");                
            }

        } catch (\Exception $e) {
            echo "Detalle: {$e->getMessage()}";
        }
    }

}
