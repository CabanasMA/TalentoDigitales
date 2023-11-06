<?php
namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$dato['titulo']='Pagina Principal';
		echo view('front/header_view',$dato);
		echo view('front/navbar_view');
		echo view('front/principal');
		echo view('front/footer_view');
	}
	
	public function quienes_somos()
	{
		$dato['titulo']='Quienes Somos';
		echo view('front/header_view',$dato);
		echo view('front/navbar_view');
		echo view('front/quienes_somos');
		echo view('front/footer_view');
	}

	
	public function acerca_de()
	{
		$dato['titulo']='Acerca de...';
		echo view('front/header_view',$dato);
		echo view('front/navbar_view');
		echo view('front/acerca_de');
		echo view('front/footer_view');
	}


	
	public function registro()
	{
		$dato['titulo']='Registrarse';
		echo view('front/header_view',$dato);
		echo view('front/navbar_view');
		echo view('Back/usuario/registro');
		echo view('front/footer_view');
	}

	public function login()
	{
		$dato['titulo']='Ingresar';
		echo view('front/header_view',$dato);
		echo view('front/navbar_view');
		echo view('Back/usuario/login');
		echo view('front/footer_view');
	}

	
	public function gracias()
	{
		$dato['titulo']='Gracias!';
		echo view('front/header_view',$dato);
		echo view('front/navbar_view');
		echo view('front/gracias');
		echo view('front/footer_view');
	}


	//--------------------------------------------------------------------

}