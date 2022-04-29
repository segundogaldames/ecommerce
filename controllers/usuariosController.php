<?php

use models\Rol;
use models\Usuario;

class usuariosController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Usuarios');
        $this->_view->assign('title','Lista de Usuarios');
        $this->_view->assign('usuarios', Usuario::with('rol')->get());
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        # code...
    }

    public function login()
    {

    }

    public function logout()
    {
        // $acceso = Usuario::find(Session::get('ingreso'));
        // $acceso->save();

        Session::destroy();

        $this->redireccionar();
    }

    public function edit($id = null)
    {

    }

    public function editPassword($id = null)
    {

    }





    public function add()
    {
        $this->_view->assign('titulo','Nuevo Usuario');
        $this->_view->assign('title','Nuevo Usuario');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('ruta','usuarios/');
        $this->_view->assign('roles', Rol::select('id','nombre')->orderBy('id','asc')->get());
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('usuario', $_POST);

            if (!$this->getSql('rut')) {
                $this->_view->assign('_error','Ingrese el RUT del usuario');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getSql('name')) {
                $this->_view->assign('_error','Ingrese el nombre del usuario');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getSql('lastname')) {
                $this->_view->assign('_error','Ingrese el o los apellidos del usuario');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->validarEmail($this->getPostParam('email'))) {
                $this->_view->assign('_error','Ingrese el email del usuario');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getSql('phone') && strlen($this->getSql('phone')) < 9) {
                $this->_view->assign('_error','El teléfono debe contener al menos 9 dígitos');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('rol')) {
                $this->_view->assign('_error','Seleccione el rol del usuario');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getSql('clave')) {
                $this->_view->assign('_error','Ingrese el password del usuario');
                $this->_view->renderizar('add');
                exit;
            }
            $usuario = Usuario::select('id')->where('rut', $this->getSql('rut'))->first();

            if ($usuario) {
                $this->_view->assign('_error','El usuario ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            $clave = $this->encriptar($this->getSql('clave'));

            $usuario = new Usuario;
            $usuario->rut = $this->getSql('rut');
            $usuario->name = $this->getSql('name');
            $usuario->lastname = $this->getSql('lastname');
            $usuario->email = $this->getPostParam('email');
            $usuario->phone = $this->getSql('phone');
            $usuario->status = 1;
            $usuario->clave = $clave;
            $usuario->rol_id = $this->getInt('rol');
            $res = $usuario->save();

            if ($res) {
                Session::set('msg_success','El usuario se ha registrado correctamente');
            }else {
                Session::set('msg_success','El usuario no se ha registrado... intente nuevamente');
            }

            $this->redireccionar('usuarios');
        }

        $this->_view->renderizar('add');
    }

    #############################################
    private function verificarUsuario($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('funcionarios');
        }

        $usuario = Usuario::select('id')->find($this->filtrarInt($id));

        if (!$usuario) {
            $this->redireccionar('funcionarios');
        }
    }

    private function encriptar($clave)
    {
        $clave = Hash::getHash('sha1', $clave, HASH_KEY);

        return $clave;
    }
}
