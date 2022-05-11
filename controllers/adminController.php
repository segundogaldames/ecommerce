<?php

class adminController extends Controller
{

	public function __construct(){
		$this->verificarSession();
		Session::tiempo();
		parent::__construct();
	}

	public function index()
	{
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Panel de Administración');

		$this->_view->renderizar('index');
	}

	###########################################
	public function validate($vista){}
}