<?php
namespace App\Controllers;

// Importa la clase Controller de CodeIgniter
use CodeIgniter\Controller;

// Define la clase Panel_controller que extiende de Controller
class Panel_controller extends Controller
{
    // Función para mostrar el panel de control del usuario
    public function index()
    {
        // Obtiene la instancia de sesión
        $session = session();

        // Obtiene el nombre de usuario y perfil del usuario de la sesión
        $nombre = $session->get('usuario');
        $perfil = $session->get('perfil_id');

        // Almacena el perfil del usuario en un arreglo de datos
        $data['perfil_id'] = $perfil;

        // Define el título de la página
        $dato['titulo'] = 'Panel de control del Usuario';


        /*Aqui se ve la diferencia de contenido entre 
        la variable $data 
        y la variable $dato
        */

        // Carga las vistas para construir la página
        echo view('front/header_view', $dato);
        echo view('front/navbar_view');
        echo view('Back/usuario/usuario_logueado', $data);
        echo view('front/footer_view');
    }
}