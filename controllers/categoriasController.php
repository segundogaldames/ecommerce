<?php
use models\Categoria;
use models\Producto;

class categoriasController extends Controller
{
	public function __construct(){
		$this->verificarSession();
		Session::tiempo();
        #$this->verificarRolAdminSuper();
		parent::__construct();
        $this->tema = 'Categorías de productos';
        $this->permisos = $this->getPermisos('Categorias');
	}

	public function index()
	{
        if ($this->permisos->leer != 1) {
            $this->redireccionar('error/noPermit');
        }

		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Categorias');
        $this->_view->assign('title','Lista de Categorías');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('categorias', Categoria::select('id','nombre','status')->get());

		$this->_view->renderizar('index');
	}

    public function view($id = null)
    {
        if ($this->permisos->leer != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarCategoria($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Categoria');
        $this->_view->assign('title','Detalle de Categoría');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('categoria', Categoria::find($this->filtrarInt($id)));

        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        if ($this->permisos->actualizar != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarCategoria($id);

        $this->_view->assign('titulo', 'Editar Categoria');
        $this->_view->assign('title','Editar Categoría');
        $this->_view->assign('button','Editar');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('categoria', Categoria::find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('categoria', $_POST);

            $this->validate('edit');

            $categoria = Categoria::find($this->filtrarInt($id));
            $categoria->nombre = $this->getSql('nombre');
            $categoria->descripcion = $this->getSql('descripcion');
            $categoria->status = $this->getInt('status');
            $res = $categoria->save();

            if ($res) {
                Session::set('msg_success','La categoria se ha modificado correctamente');
            }else {
                Session::set('msg_error','La categoria no se ha modificado... intente nuevamente');
            }

            $this->redireccionar('categorias/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function newImagen($id = null)
    {
        if ($this->permisos->escribir != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarCategoria($id);

        $this->_view->assign('titulo', 'Imagen Categoria');
        $this->_view->assign('title','Cambiar Imagen Categoría');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            $imagen = $_FILES['imagen']['name'];
            $tmp_name = $_FILES['imagen']['tmp_name'];
            $upload = $_SERVER['DOCUMENT_ROOT'] . '/ecommerce/public/img/categorias/';
            $fichero = $upload . basename($_FILES['imagen']['name']);

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero)) {
            # code...
                $categoria =  Categoria::find($this->filtrarInt($id));
                $categoria->portada = $imagen;
                $res = $categoria->save();

                if ($res) {
                Session::set('msg_success','La imagen se ha modificado correctamente');
                }else {
                Session::set('msg_error','La imagen no se ha modificado... intente nuevamente');
                }
            }

            $this->redireccionar('categorias/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('newImagen');
    }

    public function add()
    {
        if ($this->permisos->escribir != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->_view->assign('titulo', 'Nueva Categoria');
        $this->_view->assign('title','Nueva Categoría');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('categoria', $_POST);

            $this->validate('add');

            $imagen = $_FILES['imagen']['name'];
            $tmp_name = $_FILES['imagen']['tmp_name'];
            $upload = $_SERVER['DOCUMENT_ROOT'] . '/ecommerce/public/img/categorias/';
            $fichero = $upload . basename($_FILES['imagen']['name']);

            $categoria = Categoria::select('id')->where('nombre', $this->getSql('nombre'))->first();
            if ($categoria) {
                $this->_view->assign('_error','La categoría ingresada ya existe... intente con otra');
                $this->_view->renderizar('add');
                exit;
            }

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero)) {
                # code...
                $categoria = new Categoria;
                $categoria->nombre = $this->getSql('nombre');
                $categoria->descripcion = $this->getSql('descripcion');
                $categoria->portada = $imagen;
                $categoria->status = $this->getInt('status');
                $res = $categoria->save();

                if ($res) {
                    Session::set('msg_success','La categoria se ha ingresado correctamente');
                }else {
                    Session::set('msg_error','La categoria no se ha ingresado... intente nuevamente');
                }
            }

            $this->redireccionar('categorias');

        }

        $this->_view->renderizar('add');
    }

    ##################################################################
    private function verificarCategoria($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('categorias');
        }

        $categoria = Categoria::select('id')->find($this->filtrarInt($id));

        if (!$categoria) {
            $this->redireccionar('categorias');
        }
    }

    public function validate($vista)
    {
        if (!$this->getSql('nombre')) {
            $this->_view->assign('_error','Ingrese el nombre de la categoría');
            $this->_view->renderizar($vista);
            exit;
        }

        if (!$this->getSql('descripcion')) {
            $this->_view->assign('_error','Ingrese la descripción de la categoría');
            $this->_view->renderizar($vista);
            exit;
        }

        if (!$this->getInt('status')) {
            $this->_view->assign('_error','Seleccione el status de la categoría');
            $this->_view->renderizar($vista);
            exit;
        }

        if ($vista == 'edit') {
            $categoria = Categoria::select('id')
                ->where('nombre', $this->getSql('nombre'))
                ->where('descripcion', $this->getSql('descripcion'))
                ->where('status', $this->getInt('status'))
                ->first();

            if ($categoria) {
                $this->_view->assign('_error','La categoría ingresada ya existe... modifique alguno de los datos para
                continuar');
                $this->_view->renderizar('edit');
                exit;
            }
        }
    }
}