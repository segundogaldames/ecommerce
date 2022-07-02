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
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));
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

            $this->validaForm('edit',[
                'codigo' => $this->getTexto('codigo'),
                'nombre' => $this->getTexto('nombre'),
                'descripcion' => $this->getTexto('descripcion'),
                'precio' => $this->getTexto('precio'),
                'stock' => $this->getTexto('stock'),
                'status' => $this->getTexto('status'),
                'categoria' => $this->getTexto('categoria')
            ]);

            $ruta = Helper::friendlyRoute($this->getTexto('nombre'));

            $producto = Producto::find($this->filtrarInt($id));
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

            $this->validaForm('edit',[
                'codigo' => $this->getTexto('codigo'),
                'nombre' => $this->getTexto('nombre'),
                'descripcion' => $this->getTexto('descripcion'),
                'precio' => $this->getTexto('precio'),
                'stock' => $this->getTexto('stock'),
                'status' => $this->getTexto('status'),
                'categoria' => $this->getTexto('categoria')
            ]);

             $producto = Producto::select('id')->where('codigo', $this->getAlphaNum('codigo'))->first();

             if ($producto) {
                $this->_view->assign('_error','El producto ingresado ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
             }

            $ruta = Helper::friendlyRoute($this->getTexto('nombre'));

            $producto = new Producto;
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
        if ($this->filtrarInt($id)) {
            $producto = Producto::select('id')->find($this->filtrarInt($id));

            if ($producto) {
                return true;
            }
        }

        $this->redireccionar('productos');

    }
}