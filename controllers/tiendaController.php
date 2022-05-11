<?php
use models\Categoria;
use models\Producto;

class tiendaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function categoria($id = null)
    {
        $this->verificarCategoria($id);

        $categoria = Categoria::find($this->filtrarInt($id));

        $this->_view->assign('titulo', 'Productos ' . $categoria->nombre);
        $this->_view->assign('categoria', $categoria);
        $this->_view->assign('productos', Producto::with(['categoria','imagenes'])->where('categoria_id',
        $this->filtrarInt($id))->get());

        $this->_view->renderizar('categoria');
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
}
