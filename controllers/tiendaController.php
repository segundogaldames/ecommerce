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
        $this->_view->assign('titulo', 'Productos');
        $this->_view->assign('imagenes', Imagen::with('producto')->where('portada', 1)->get());

        $this->_view->renderizar('index');
    }

    public function categoria($id = null)
    {
        $this->verificarCategoria($id);

        $categoria = Categoria::find($this->filtrarInt($id));

        $this->_view->assign('titulo', 'Productos ' . $categoria->nombre);
        $this->_view->assign('categoria', $categoria);
        $this->_view->assign('productos', Producto::with(['categoria','imagenes'])->where('categoria_id', $this->filtrarInt($id))->get());

        $this->_view->renderizar('categoria');
    }

    public function producto($id = null)
    {
        $this->verificarProducto($id);

        $this->_view->assign('titulo', 'Producto');
        $this->_view->assign('producto', Producto::with(['categoria','imagenes'])->find($this->filtrarInt($id)));

        $this->_view->renderizar('producto');
    }

    #########################################################
    public function validate($vista)
    {

    }

    private function verificarCategoria($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar();
        }

        $categoria = Categoria::select('id')->find($this->filtrarInt($id));

        if (!$categoria) {
            $this->redireccionar();
        }
    }

    private function verificarProducto($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar();
        }

        $producto = Producto::select('id')->find($this->filtrarInt($id));

        if (!$producto) {
            $this->redireccionar();
        }
    }
}
