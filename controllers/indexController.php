<?php
use models\Categoria;
use models\Producto;
use models\Imagen;

class indexController extends Controller
{

	public function __construct(){
		// $this->verificarSession();
		// Session::tiempo();
		parent::__construct();
	}

	public function index()
	{
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Bienvenido(a)');
		$this->_view->assign('categorias_slider', Categoria::get());
		$this->_view->assign('categorias_banner', Categoria::whereIn('id', [2,3,4])->get());
		$this->_view->assign('imagenes', Imagen::with('producto')->where('portada', 1)->get());


		$this->_view->renderizar('index');
	}

	###########################################
	public function validate($vista){}
}