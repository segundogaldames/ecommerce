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
	}

	public function index()
	{
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Productos');
        $this->_view->assign('title','Lista de Productos');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('productos', Producto::with('categoria')->get());

		$this->_view->renderizar('index');
	}

    public function view($id = null)
    {
        $this->verificarProducto($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Producto');
        $this->_view->assign('title','Detalle de Producto');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('producto', Producto::with('categoria')->find($this->filtrarInt($id)));

        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        $this->verificarProducto($id);

        $this->_view->assign('titulo', 'Editar Producto');
        $this->_view->assign('title','Editar Producto');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('button', 'Editar');
        $this->_view->assign('categorias', Categoria::select('id','nombre')->orderBy('nombre','ASC')->get());
        $this->_view->assign('producto', Producto::with('categoria')->find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$this->getAlphaNum ('codigo')) {
                $this->_view->assign('_error','Ingrese el código del producto');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getAlphaNum('nombre')) {
                $this->_view->assign('_error','Ingrese el nombre del producto');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getAlphaNum('descripcion')) {
                $this->_view->assign('_error','Ingrese la descrición del producto');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('precio')) {
                $this->_view->assign('_error','Ingrese el precio del producto');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('stock')) {
                $this->_view->assign('_error','Ingrese el stock del producto');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('status')) {
                $this->_view->assign('_error','Seleccione el status del producto');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('categoria')) {
                $this->_view->assign('_error','Seleccione la categoría del producto');
                $this->_view->renderizar('edit');
                exit;
            }

            $producto = Producto::select('id')
                    ->where('codigo', $this->getAlphaNum('codigo'))
                    ->where('nombre', $this->getAlphaNum('nombre'))
                    ->where('descripcion', $this->getAlphaNum('descripcion'))
                    ->where('precio', $this->getInt('precio'))
                    ->where('stock', $this->getInt('stock'))
                    ->where('status', $this->getInt('status'))
                    ->where('categoria_id', $this->getInt('categoria'))
                    ->first();

            if ($producto) {
            $this->_view->assign('_error','El producto ingresado ya existe... Modifique algunos de los datos para continuar');
            $this->_view->renderizar('edit');
            exit;
            }


            $producto = Producto::find($this->filtrarInt($id));
            $producto->codigo = $this->getAlphaNum('codigo');
            $producto->nombre = $this->getAlphaNum('nombre');
            $producto->descripcion = $this->getAlphaNum('descripcion');
            $producto->precio = $this->getInt('precio');
            $producto->stock = $this->getInt('stock');
            $producto->status = $this->getInt('status');
            $producto->categoria_id = $this->getInt('categoria');
            $res = $producto->save();

            if ($res) {
                Session::set('msg_success','El producto se ha modificado correctamente');
            }else {
                Session::set('msg_error','El producto no se ha modificado... intente nuevamente');
            }

            $this->redireccionar('productos/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function add()
    {
        $this->_view->assign('titulo', 'Nuevo Producto');
        $this->_view->assign('title','Nuevo Productos');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('button', 'Guardar');
        $this->_view->assign('categorias', Categoria::select('id','nombre')->orderBy('nombre','ASC')->get());
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('producto',$_POST);

            if (!$this->getAlphaNum ('codigo')) {
                $this->_view->assign('_error','Ingrese el código del producto');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getAlphaNum('nombre')) {
                $this->_view->assign('_error','Ingrese el nombre del producto');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getAlphaNum('descripcion')) {
                    $this->_view->assign('_error','Ingrese la descrición del producto');
                    $this->_view->renderizar('add');
                    exit;
            }

            if (!$this->getInt('precio')) {
                $this->_view->assign('_error','Ingrese el precio del producto');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('stock')) {
                $this->_view->assign('_error','Ingrese el stock del producto');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('status')) {
                $this->_view->assign('_error','Seleccione el status del producto');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('categoria')) {
                $this->_view->assign('_error','Seleccione la categoría del producto');
                $this->_view->renderizar('add');
                exit;
            }

            $producto = Producto::select('id')->where('codigo', $this->getAlphaNum('codigo'))->first();

            if ($producto) {
                $this->_view->assign('_error','El producto ingresado ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }


            $producto = new Producto;
            $producto->codigo = $this->getAlphaNum('codigo');
            $producto->nombre = $this->getAlphaNum('nombre');
            $producto->descripcion = $this->getAlphaNum('descripcion');
            $producto->precio = $this->getInt('precio');
            $producto->stock = $this->getInt('stock');
            $producto->status = $this->getInt('status');
            $producto->categoria_id = $this->getInt('categoria');
            $res = $producto->save();

            if ($res) {
                Session::set('msg_success','El producto se ha registrado correctamente');
            }else {
                Session::set('msg_error','El producto no se ha registrado... intente nuevamente');
            }

            $this->redireccionar('productos');
        }

        $this->_view->renderizar('add');
    }

    ####################################################################
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