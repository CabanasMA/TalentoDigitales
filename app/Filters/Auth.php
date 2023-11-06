<?php
namespace App\Filters;

use Codeigniter\Filter\FilterInterface;
use Codeigniter\HTTP\RequestInterface;
use Codeigniter\HTTP\ResponseInterface;

class Auth implements \CodeIgniter\Filters\FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //usuario no logueado:
        if (!session()->get('logged_in')) {
            //redireccionamos a la pagina de login
            return redirect()->to('login');

        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //accion a agregar
    }
}