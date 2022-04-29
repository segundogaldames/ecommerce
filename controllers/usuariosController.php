<?php

use models\Rol;
use models\Usuario;

class usuariosController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->tema = 'Usuarios del sistema';
    }

    public function index()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Usuarios');
        $this->_view->assign('title','Lista de Usuarios');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('usuarios', Usuario::with('rol')->get());
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        $this->verificarUsuario($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Usuario');
        $this->_view->assign('title','Detalle Usuario');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('usuario', Usuario::with('rol')->find($this->filtrarInt($id)));
        $this->_view->renderizar('view');
    }

    public function login()
    {
        //print_r($_POST);exit;
        $this->_view->assign('titulo', 'Usuario Login');
        $this->_view->assign('title','Login de Usuario');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            //print_r($_POST);exit;
            if (!$this->validarEmail($this->getPostParam('email'))) {
                $this->_view->assign('_error','Ingrese su correo electrónico');
                $this->_view->renderizar('login');
                exit;
            }

            if (!$this->getSql('clave')) {
                $this->_view->assign('_error','Ingrese su password');
                $this->_view->renderizar('login');
                exit;
            }


            $usuario = Usuario::with('rol')
                    ->where('email', $this->getPostParam('email'))
                    ->where('clave', $this->encriptar($this->getSql('clave')))
                    ->first();

            //print_r($usuario);exit;

            if (!$usuario) {
                $this->_view->assign('_error','El email o el password no están registrados... intente nuevamente');
                $this->_view->renderizar('login');
                exit;
            }

            Session::set('autenticado', true);
            Session::set('usuario_id', $usuario->id);
            Session::set('usuario_name', $usuario->name . ' ' . $usuario->lastname);
            Session::set('rol', $usuario->rol->nombre);
            Session::set('tiempo', time());

            $this->redireccionar();
        }

        $this->_view->renderizar('login');
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
        $this->verificarUsuario($id);

        $this->_view->assign('titulo','Editar Usuario');
        $this->_view->assign('title','Editar Usuario');
        $this->_view->assign('button','Editar');
        $this->_view->assign('ruta','usuarios/views/' . $this->filtrarInt($id));
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('roles', Rol::select('id','nombre')->orderBy('id','asc')->get());
        $this->_view->assign('usuario', Usuario::with('rol')->find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$this->getSql('rut')) {
                $this->_view->assign('_error','Ingrese el RUT del usuario');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getSql('name')) {
                $this->_view->assign('_error','Ingrese el nombre del usuario');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getSql('lastname')) {
                $this->_view->assign('_error','Ingrese el o los apellidos del usuario');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->validarEmail($this->getPostParam('email'))) {
                $this->_view->assign('_error','Ingrese el email del usuario');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getSql('phone') && strlen($this->getSql('phone')) < 9) {
                $this->_view->assign('_error','El teléfono debe contener al menos 9 dígitos');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('rol')) {
                $this->_view->assign('_error','Seleccione el rol del usuario');
                $this->_view->renderizar('edit');
                exit;
            }
            if (!$this->getInt('status')) {
                $this->_view->assign('_error','Seleccione el status del usuario');
                $this->_view->renderizar('edit');
                exit;
            }

                $usuario = Usuario::select('id')
                    ->where('rut', $this->getSql('rut'))
                    ->where('name', $this->getSql('name'))
                    ->where('lastname', $this->getSql('lastname'))
                    ->where('email', $this->getPostParam('email'))
                    ->where('phone', $this->getSql('phone'))
                    ->where('rol_id', $this->getInt('rol'))
                    ->where('status', $this->getInt('status'))
                    ->first();

            if ($usuario) {
                $this->_view->assign('_error','El usuario ya existe... modifique alguno de los datos del formulario para continuar');
                $this->_view->renderizar('edit');
                exit;
            }


            $usuario = Usuario::find($this->filtrarInt($id));
            $usuario->rut = $this->getSql('rut');
            $usuario->name = $this->getSql('name');
            $usuario->lastname = $this->getSql('lastname');
            $usuario->email = $this->getPostParam('email');
            $usuario->phone = $this->getSql('phone');
            $usuario->status = $this->getInt('status');
            $usuario->rol_id = $this->getInt('rol');
            $res = $usuario->save();

            if ($res) {
                Session::set('msg_success','El usuario se ha modificado correctamente');
            }else {
                Session::set('msg_success','El usuario no se ha modificado... intente nuevamente');
            }

            $this->redireccionar('usuarios/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
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
        $this->_view->assign('tema', $this->tema);
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
            $this->redireccionar('usuarios');
        }

        $usuario = Usuario::select('id')->find($this->filtrarInt($id));

        if (!$usuario) {
            $this->redireccionar('usuarios');
        }
    }

    private function encriptar($clave)
    {
        $clave = Hash::getHash('sha1', $clave, HASH_KEY);

        return $clave;
    }
}