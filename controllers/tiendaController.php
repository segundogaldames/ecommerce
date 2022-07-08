<?php
use models\Categoria;
use models\Producto;
use models\Imagen;

class tiendaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Productos');
        $this->_view->assign('imagenes', Imagen::with('producto')->where('portada', 1)->get());

        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {

    }

    public function categoria($ruta = null)
    {
        $categoria = Categoria::where('ruta', $ruta)->first();
        $this->verificarCategoria($categoria->id);


        $this->_view->assign('titulo', 'Productos ' . $categoria->nombre);
        $this->_view->assign('categoria', $categoria);
        $this->_view->assign('productos', Producto::with(['categoria','imagenes'])->where('categoria_id', $categoria->id)->get());

        $this->_view->renderizar('categoria');
    }

    public function producto($ruta = null)
    {
        $this->verificarMensajes();

        if (Session::get('autenticado')) {
            $enviar = Session::get('usuario_id');
        }else {
            $enviar = 'addCarrito'.CTRL;
        }

        $producto = Producto::with(['categoria','imagenes'])->where('ruta', $ruta)->first();
        $this->verificarProducto($producto->id);

        $this->_view->assign('titulo', 'Producto');
        $this->_view->assign('producto', $producto);
        $this->_view->assign('productos', Producto::with(['categoria','imagenes'])->where('categoria_id', $producto->categoria_id)->get());
        $this->_view->assign('enviar', $this->encrypt($enviar));

        $this->_view->renderizar('producto');
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

    #########################################################

    private function verificarCategoria($id)
    {
        if ($this->filtrarInt($id)) {
            $categoria = Categoria::select('id')->find($this->filtrarInt($id));

            if ($categoria) {
                return true;
            }
        }

        $this->redireccionar();
    }

    private function verificarProducto($id)
    {
        if ($this->filtrarInt($id)) {
            $producto = Producto::select('id')->find($this->filtrarInt($id));

            if ($producto) {
                return true;
            }
        }

        $this->redireccionar();
    }
}
