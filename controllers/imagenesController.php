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
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));

        if ($this->decrypt($this->getAlphaNum('enviar')) == Session::get('usuario_id')) {

            $producto = Imagen::select('id','producto_id')->find($this->filtrarInt($id));

            $this->validaForm('editPortada',[
                'portada' => $this->getTexto('portada')
            ]);

            $portada = Imagen::select('id','portada')
                ->where('portada', $this->getInt('portada'))
                ->where('producto_id', $this->filtrarInt($producto->producto_id))
                ->first();

            //print_r($portada->portada);exit;
            if ($portada->portada == 1) {
                $this->_view->assign('_error', 'Ya existe otra imagen de portada... intente con otra');
                $this->_view->renderizar('editPortada');
                exit;
            }

            $imagen = Imagen::find($this->filtrarInt($id));
            $imagen->portada = $this->getInt('portada');
            $res = $imagen->save();

            if ($res) {
                Session::set('msg_success','La opción de portada se ha modificado correctamente');
            }else {
                Session::set('msg_error','La opción de portada no se ha modificado... intente nuevamente');
            }

            $this->redireccionar('productos/view/' . $producto->producto_id);
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
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));

        if ($this->decrypt($this->getAlphaNum('enviar')) == Session::get('usuario_id')) {

            if (!$_FILES['imagen']['name']) {
                $this->_view->assign('_error','Seleccione una imagen para el producto');
                $this->_view->renderizar('add');
                exit;
            }

            $extension = explode('.', $_FILES['imagen']['name']);
            $extension = end($extension);
            //print_r($extension);exit;

            if ($extension != 'jpeg' && $extension != 'jpg') {
                $this->_view->assign('_error','Seleccione una imagen para el producto');
                $this->_view->renderizar('add');
                exit;
            }

            if ($_FILES['imagen']['size'] > 6000000) {
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

            $portada = Imagen::select('id')
                ->where('portada', 1)
                ->where('producto_id', $this->filtrarInt($producto))
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
                $imagen->producto_id = $this->filtrarInt($producto);
                $res = $imagen->save();

            }

            if ($res) {
                Session::set('msg_success','La imagen se ha registrado correctamente');
            }else {
                Session::set('msg_error','La imagen no se ha registrado... intente nuevamente');
            }

            $this->redireccionar('productos/view/' . $this->filtrarInt($producto));
        }

        $this->_view->renderizar('add');
    }

    public function delete()
    {
        if ($this->permiso->eliminar!=1) {
            $this->redireccionar('error/noPermit');
        }

        if ($this->decrypt($this->getAlphaNum('enviar')) == Session::get('usuario_id')) {
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