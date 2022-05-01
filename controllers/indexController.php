<?php

class indexController extends Controller
{
	private $_enlace;

	public function __construct(){
		Session::tiempo();
		parent::__construct();
		$this->verificarSession();
	}

	public function index()
	{
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Bienvenido(a)');

		$this->_view->renderizar('index');
	}
}