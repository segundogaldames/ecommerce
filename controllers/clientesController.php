<?php
use models\Usuario;

class clientesController extends Controller
{
	private $_enlace;

	public function __construct(){
		Session::tiempo();
		parent::__construct();
		$this->verificarSession();
        $this->verificarRolAdminSuper();
        $this->tema = 'Clientes de la tienda';
	}

	public function index()
	{
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Clientes');
        $this->_view->assign('title','Lista de Clientes');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('clientes', Usuario::select('id','rut','name','lastname','status')->where('rol_id', 2)->get());

		$this->_view->renderizar('index');
	}
}