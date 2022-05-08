<?php
use models\Imagen;
use models\Producto;

class imagenesController extends Controller
{

	public function __construct(){
		$this->verificarSession();
		Session::tiempo();
        #$this->verificarRolAdmin();
		parent::__construct();
        $this->tema = 'Imágenes de productos';
        $this->permiso = $this->getPermisos('Imagenes');
	}

	public function index()
	{
        $this->_view->renderizae('index');
	}

    public function add($producto = null)
    {
        if ($this->permiso->escribir != 1) {
            $this->redireccionar();
        }

        $this->verificarProducto($producto);

        $this->_view->assign('titulo', 'Nueva Imagen');
        $this->_view->assign('title','Nueva Imagen');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('button', 'Guardar');
        $this->_view->assign('producto', Producto::select('codigo','nombre')->find($this->filtrarInt($producto)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$_FILES['imagen']['name']) {
                $this->_view->assign('_error','Seleccione una imagen para el producto');
                $this->_view->renderizar('add');
                exit;
            }

            if ($_FILES['imagen']['type'] != 'image/jpeg') {
                $this->_view->assign('_error','Seleccione una imagen jpeg para el producto');
                $this->_view->renderizar('add');
                exit;
            }

            if ($_FILES['imagen']['size'] > 60000) {
                $this->_view->assign('_error','La imagen excede el peso máximo de 30 kilobytes');
                $this->_view->renderizar('add');
                exit;
            }

            $img_prod = $_FILES['imagen']['name'];
            $tmp_name = $_FILES['imagen']['tmp_name'];
            $upload = $_SERVER['DOCUMENT_ROOT'] . '/ecommerce/public/img/productos/';
            $fichero = $upload . basename($_FILES['imagen']['name']);

            $imagen = Imagen::select('id')
                    ->where('img', $img_prod)
                    ->where('producto_id', $this->filtrarInt($producto))
                    ->first();
            //print_r($imagen);exit;
            if ($imagen) {
                $this->_view->assign('_error','La imagen ingresada ya existe... intente con otra');
                $this->_view->renderizar('add');
                exit;
            }

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero)) {
                # code...
                $imagen = new Imagen;
                $imagen->img = $img_prod;
                $imagen->producto_id = $this->filtrarInt($producto);
                $res = $imagen->save();

                if ($res) {
                    Session::set('msg_success','La imagen se ha registrado correctamente');
                }else {
                    Session::set('msg_error','La imagen no se ha registrado... intente nuevamente');
                }
            }

            $this->redireccionar('productos/view/' . $this->filtrarInt($producto));
        }

        $this->_view->renderizar('add');
    }

    public function delete()
    {

        if ($this->getAlphaNum('enviar') == CTRL) {
            if ($this->getInt('imagen')) {

                $this->verificarImagen($this->getInt('imagen'));

                $imagen = Imagen::select('id', 'img' ,'producto_id')->find($this->getInt('imagen'));
                $imagen->delete();

                unlink($_SERVER['DOCUMENT_ROOT'] . '/ecommerce/public/img/productos/' . $imagen->img);
            }
            Session::set('msg_success','La imagen se ha eliminado correctamente');
        }

        $this->redireccionar('productos/view/' . $imagen->producto_id);
    }

    ######################################################
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

    private function verificarImagen($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('productos');
        }

        $imagen = Imagen::select('id')->find($this->filtrarInt($id));

        if (!$imagen) {
            $this->redireccionar('productos');
        }
    }
}