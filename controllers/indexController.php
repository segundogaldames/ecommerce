<?php

class indexController extends Controller
{
	private $_enlace;

	public function __construct(){
		parent::__construct();

	}

	public function index()
	{
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Bienvenido a Tienda Virtual');

		$this->_view->renderizar('index');
	}
}