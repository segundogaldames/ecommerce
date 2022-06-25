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

	}

    public function editPortada($id = null)
    {
        if ($this->permiso->actualizar != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarImagen($id);

        $this->_view->assign('titulo','Editar Portada');
        $this->_view->assign('title','Editar Portada de Imagen');
        $this->_view->assign('button','Editar');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('imagen', Imagen::find($this->filtrarInt($id)));
        $this->_view->assign('enviar', $this->encrypt(CTRL));

        if ($this->decrypt($this->getAlphaNum('enviar')) == CTRL) {

            $id_producto = Imagen::select('id','producto_id')->find($this->filtrarInt($id));

            $this->validate('editPortada', $id_producto);
            $this->setting('editPortada', $id);

            $this->redireccionar('productos/view/' . $id_producto->producto_id);
        }

        $this->_view->renderizar('editPortada');
    }

    public function add($producto = null)
    {
        if ($this->permiso->escribir != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarProducto($producto);

        $this->_view->assign('titulo', 'Nueva Imagen');
        $this->_view->assign('title','Nueva Imagen');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('button', 'Guardar');
        $this->_view->assign('producto', Producto::select('codigo','nombre')->find($this->filtrarInt($producto)));
        $this->_view->assign('enviar', $this->encrypt(CTRL));

        if ($this->decrypt($this->getAlphaNum('enviar')) == CTRL) {

            $this->validate('add');
            $this->setting('add', $producto);

            $this->redireccionar('productos/view/' . $this->filtrarInt($producto));
        }

        $this->_view->renderizar('add');
    }

    public function delete()
    {
        if ($this->permiso->eliminar!=1) {
            $this->redireccionar('error/noPermit');
        }

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
    public function validate($vista, $data = null)
    {
        if ($vista == 'editPortada') {
            if (!$this->getInt('portada')) {
                $error = 'Seleccione una opción';
            }else {

                $portada = Imagen::select('id','portada')
                    ->where('portada', $this->getInt('portada'))
                    ->where('producto_id', $data->producto_id)
                    ->first();

                //print_r($portada->portada);exit;
                if ($portada->portada == 1) {
                    $error = 'Ya existe otra imagen de portada... intente con otra';
                }
            }

            if (isset($error)) {
                # code...
                $this->_view->assign('_error',$error);
                $this->_view->renderizar($vista);
                exit;
            }

        }else {
            # code...
            if (!$_FILES['imagen']['name']) {
                $this->_view->assign('_error','Seleccione una imagen para el producto');
                $this->_view->renderizar($vista);
                exit;
            }

            $extension = explode('.', $_FILES['imagen']['name']);
            $extension = end($extension);
            //print_r($extension);exit;

            if ($extension != 'jpeg' && $extension != 'jpg') {
                $this->_view->assign('_error','Seleccione una imagen para el producto');
                $this->_view->renderizar($vista);
                exit;
            }

            if ($_FILES['imagen']['size'] > 6000000) {
                $this->_view->assign('_error','La imagen excede el peso máximo de 30 kilobytes');
                $this->_view->renderizar($vista);
                exit;
            }
        }

    }

    public function setting($view, $data = null)
    {
        if ($view == 'editPortada') {
            $imagen = Imagen::find($this->filtrarInt($data));
            $imagen->portada = $this->getInt('portada');
            $res = $imagen->save();
        }else{
            $img_prod = $_FILES['imagen']['name'];
            $tmp_name = $_FILES['imagen']['tmp_name'];
            $upload = $_SERVER['DOCUMENT_ROOT'] . '/ecommerce/public/img/productos/';
            $fichero = $upload . basename($_FILES['imagen']['name']);

            $imagen = Imagen::select('id')
                ->where('img', $img_prod)
                ->where('producto_id', $this->filtrarInt($data))
                ->first();
                //print_r($imagen);exit;
            if ($imagen) {
                $this->_view->assign('_error','La imagen ingresada ya existe... intente con otra');
                $this->_view->renderizar('add');
                exit;
            }

            $portada = Imagen::select('id')
                ->where('portada', 1)
                ->where('producto_id', $this->filtrarInt($data))
                ->first();

            if ($portada) {
                $portada = 2;
            }else {
                $portada = 1;
            }

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero)) {
            # code...
                $imagen = new Imagen;
                $imagen->img = $img_prod;
                $imagen->portada = $portada;
                $imagen->producto_id = $this->filtrarInt($data);
                $res = $imagen->save();

            }
        }
        if ($res) {
            Session::set('msg_success','La imagen se ha ingresado correctamente');
        }else {
            Session::set('msg_error','La imagen no se ha ingresado... intente nuevamente');
        }
    }

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

    private function verificarImagen($id)
    {
        if ($this->filtrarInt($id)) {

            $imagen = Imagen::select('id')->find($this->filtrarInt($id));

            if ($imagen) {
                return true;
            }
        }

        $this->redireccionar('productos');
    }
}