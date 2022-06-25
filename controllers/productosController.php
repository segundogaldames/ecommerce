<?php

use models\Producto;
use models\Categoria;

class productosController extends Controller
{

	public function __construct(){
		$this->verificarSession();
		Session::tiempo();
		parent::__construct();
        $this->tema = 'Productos de la tienda';
        $this->permiso = $this->getPermisos('Productos');
	}

	public function index()
	{
        if ($this->permiso->leer!=1) {
            $this->redireccionar('error/noPermit');
        }

		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Productos');
        $this->_view->assign('title','Lista de Productos');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('productos', Producto::with('categoria')->get());

		$this->_view->renderizar('index');
	}

    public function view($id = null)
    {
        if ($this->permiso->leer!=1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarProducto($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Producto');
        $this->_view->assign('title','Detalle de Producto');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('enviar', CTRL);
        $this->_view->assign('producto', Producto::with('categoria','imagenes')->find($this->filtrarInt($id)));

        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        if ($this->permiso->actualizar!=1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarProducto($id);

        $this->_view->assign('titulo', 'Editar Producto');
        $this->_view->assign('title','Editar Producto');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('button', 'Editar');
        $this->_view->assign('categorias', Categoria::select('id','nombre')->orderBy('nombre','ASC')->get());
        $this->_view->assign('producto', Producto::with('categoria')->find($this->filtrarInt($id)));
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));

        if ($this->decrypt($this->getAlphaNum('enviar')) == Session::get('usuario_id')) {

            $this->validate('edit');
            $this->setting('edit', $id);

            $this->redireccionar('productos/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function add()
    {
        if ($this->permiso->escribir!=1) {
            $this->redireccionar('error/noPermit');
        }

        $this->_view->assign('titulo', 'Nuevo Producto');
        $this->_view->assign('title','Nuevo Productos');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('button', 'Guardar');
        $this->_view->assign('categorias', Categoria::select('id','nombre')->orderBy('nombre','ASC')->get());
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));

        if ($this->decrypt($this->getAlphaNum('enviar')) == Session::get('usuario_id')) {
            $this->_view->assign('producto',$_POST);

            $this->validate('add');
            $this->setting('add');

            $this->redireccionar('productos');
        }

        $this->_view->renderizar('add');
    }

    ####################################################################
    public function validate($vista)
    {
        if (!$this->getAlphaNum ('codigo')) {
            $error = 'Ingrese el código del producto';
        }elseif (!$this->getAlphaNum('nombre')) {
            $error = 'Ingrese el nombre del producto';
        }elseif (!$this->getAlphaNum('descripcion')) {
            $error = 'Ingrese la descripción del producto';
        }elseif (!$this->getInt('precio')) {
            $error = 'Ingrese el precio del producto';
        }elseif (!$this->getInt('stock')) {
            $error = 'Ingrese el stock del producto';
        }elseif (!$this->getInt('status')) {
            $error = 'Seleccione el status del producto';
        }elseif (!$this->getInt('categoria')) {
            $error = 'Seleccione la categoría del producto';
        }

        if (isset($error)) {
            $this->_view->assign('_error', $error);
            $this->_view->renderizar($vista);
            exit;
        }

        if ($vista == 'edit') {
            $producto = Producto::select('id')
                ->where('codigo', $this->getAlphaNum('codigo'))
                ->where('nombre', $this->getAlphaNum('nombre'))
                ->where('descripcion', $this->getAlphaNum('descripcion'))
                ->where('precio', $this->getInt('precio'))
                ->where('stock', $this->getInt('stock'))
                ->where('status', $this->getInt('status'))
                ->where('categoria_id', $this->getInt('categoria'))
                ->first();
        }else {
            $producto = Producto::select('id')->where('codigo', $this->getAlphaNum('codigo'))->first();
        }

        if ($producto) {
            if ($vista == 'edit') {
                $error = 'El producto ingresado ya existe... modifique alguno de los datos para continuar';
            }else {
                $error = 'El producto ingresado ya existe... intente con otro';
            }

            $this->_view->assign('_error', $error);
            $this->_view->renderizar($vista);
            exit;
        }
    }

    public function setting($view, $data = null)
    {
        if ($view == 'edit') {
            $producto = Producto::find($this->filtrarInt($data));
        }else {
            $producto = new Producto;
        }

        $ruta = strtolower($this->clearCadena($this->getSql('nombre')));
        $ruta = str_replace(' ','-',$ruta);

        $producto->codigo = $this->getAlphaNum('codigo');
        $producto->nombre = $this->getAlphaNum('nombre');
        $producto->ruta = $ruta;
        $producto->descripcion = $this->getAlphaNum('descripcion');
        $producto->precio = $this->getInt('precio');
        $producto->stock = $this->getInt('stock');
        $producto->status = $this->getInt('status');
        $producto->categoria_id = $this->getInt('categoria');
        $res = $producto->save();

        if ($res) {
            Session::set('msg_success','El producto se ha ingresado correctamente');
        }else {
            Session::set('msg_error','El producto no se ha ingresado... intente nuevamente');
        }
    }

    private function verificarProducto($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('productos');
        }

        $producto = Producto::select('id')->find($this->filtrarInt($id));

        if (!$producto) {
            $this->redireccionar('productos');
        }
    }
}