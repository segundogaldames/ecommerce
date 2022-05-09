<?php
use models\Usuario;

class clientesController extends Controller
{

	public function __construct(){
		$this->verificarSession();
		Session::tiempo();
		parent::__construct();
        //$this->verificarRolAdminSuper();
        $this->tema = 'Clientes de la tienda';
		$this->permisos = $this->getPermisos('Clientes');
	}

	public function index()
	{
		#print_r($this->permisos);exit;
		if ($this->permisos->leer != 1) {
			$this->redireccionar('error/noPermit');
		}
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Clientes');
        $this->_view->assign('title','Lista de Clientes');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('clientes', Usuario::select('id','rut','name','lastname','status')->where('rol_id', 2)->get());

		$this->_view->renderizar('index');
	}

	########################################################
	public function validate()
	{

	}
}