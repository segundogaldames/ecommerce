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

	public function view($id = null)
	{

	}

	public function edit($id = null)
	{

	}

	public function update($id = null)
	{

	}

	public function add()
	{

	}

	public function new()
	{

	}
}