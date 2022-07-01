<?php

class errorController extends Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{

	}

	public function error()
	{
		$this->_view->assign('titulo', 'Página No Encontrada');
		$this->_view->assign('mensaje', 'Sitio no encontrado');
		$this->_view->renderizar('error');
	}

	public function noPermit()
	{
		$this->_view->assign('titulo', 'Inaccesible');
		$this->_view->assign('mensaje', 'Acceso no permitido');
		$this->_view->renderizar('noPermit');
	}
}