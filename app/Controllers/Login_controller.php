<?php
namespace App\Controllers;

// Importa el modelo Usuarios_model y la clase Controller de CodeIgniter
use App\Models\Usuarios_model;
use Codeigniter\Controller;

// Define la clase Login_controller que extiende de BaseController
class Login_controller extends BaseController
{
    // Función para mostrar la página de inicio de sesión
    public function index()
    {
        // Carga los ayudantes 'form' y 'url'
        helper(['form', 'url']);

        // Define el título de la página
        $dato['titulo'] = 'login';

        // Carga las vistas para construir la página
        echo view('front/header_view', $dato);
        echo view('front/navbar_view');
        echo view('Back/usuario/login');
        echo view('front/footer_view');
    }

    // Función para autenticar a los usuarios
    public function auth()
    {
        // Obtiene la instancia de sesión
        $session = session();

        // Crea una instancia del modelo Usuarios_model
        $model = new Usuarios_model();

        // Recibe los datos del formulario de inicio de sesión
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        // Busca el usuario en la base de datos por su correo electrónico
        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['pass'];
            $ba = $data['baja'];

            // Verifica si el usuario está dado de baja
            if ($ba == 'SI') {
                $session->setFlashdata('msg', 'Usuario dado de baja');
                return redirect()->to('/Login_controller');
            }

            // Verifica si la contraseña es válida
            $verify_pass = password_verify($password, $pass);

            if ($verify_pass) {
                // Si la contraseña es válida, inicia la sesión
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => TRUE
                ];

                // Establece los datos de la sesión
                $session->set($ses_data);

                // Muestra un mensaje de bienvenida y redirige al panel
                // Muestra un mensaje de bienvenida personalizado y redirige al panel
                $session->setFlashdata('msg', '¡Bienvenid@ ' . $data['nombre'] . ', ' . $data['apellido'] . '!');
                return redirect()->to('panel');



                /* session()->setFlashdata('msg', '¡Bienvenidos!');
                return redirect()->to('panel'); */


            } else {
                // Si la contraseña no es válida, muestra un mensaje de error
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('Login_controller');
            }
        } else {
            // Si el correo electrónico no existe en la base de datos, muestra un mensaje de error
            $session->setFlashdata('msg', 'Correo electrónico incorrecto');
            return redirect()->to('Login_controller');
        }
    }

    // Función para cerrar sesión
    public function logout()
    {
        // Obtiene la instancia de sesión y la destruye
        $session = session();
        $session->destroy();

        // Redirige al inicio
        return redirect()->route('/');
    }
}