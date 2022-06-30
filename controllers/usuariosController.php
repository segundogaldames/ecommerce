<?php

use models\Rol;
use models\Usuario;

class usuariosController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->tema = 'Usuarios del sistema';
        $this->permiso = $this->getPermisos('Usuarios');
    }

    public function index()
    {
        $this->verificarSession();

        if ($this->permiso->leer != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Usuarios');
        $this->_view->assign('title','Lista de Usuarios');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('usuarios', Usuario::with('rol')->get());
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        $this->verificarSession();

        if ($this->permiso->leer != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarUsuario($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Usuario');
        $this->_view->assign('title','Detalle Usuario');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('usuario', Usuario::with('rol')->find($this->filtrarInt($id)));
        $this->_view->renderizar('view');
    }

    public function perfil()
    {
        $this->verificarSession();

        if ($this->permiso->leer != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Mi Perfil');
        $this->_view->assign('title','Detalle Usuario');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('usuario', Usuario::with('rol')->find($this->filtrarInt(Session::get('usuario_id'))));
        $this->_view->renderizar('perfil');
    }

    public function edit($id = null)
    {
        $this->verificarSession();

        if ($this->permiso->actualizar != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarUsuario($id);

        $this->_view->assign('titulo','Editar Usuario');
        $this->_view->assign('title','Editar Usuario');
        $this->_view->assign('button','Editar');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('roles', Rol::select('id','nombre')->orderBy('id','asc')->get());
        $this->_view->assign('usuario', Usuario::with('rol')->find($this->filtrarInt($id)));
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));

        if ($this->decrypt($this->getAlphaNum('enviar')) == Session::get('usuario_id')) {

            $this->validate('edit');
            $this->setting('edit', $id);

            $this->redireccionar('usuarios/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function resetPassword()
    {
        if (Session::get('autenticado')) {
            $this->redireccionar();
        }
        //print_r($_POST);exit;
        $this->_view->assign('titulo', 'Reset Password');
        $this->_view->assign('title','Recuperar Password');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$this->validarEmail($this->getPostParam('email'))) {
                $this->_view->assign('_error','Ingrese un correo electrónico válido');
                $this->_view->renderizar('resetPassword');
                exit;
            }

            $usuario = Usuario::select('id')->where('email', $this->getPostParam('email'))->first();

            if (!$usuario) {
                $this->_view->assign('_error','El correo electrónico no está registrado');
                $this->_view->renderizar('resetPassword');
                exit;
            }

            Session::set('id_user', $usuario->id);
            $this->redireccionar('usuarios/confirmUser');
        }

        $this->_view->renderizar('resetPassword');
    }

    public function confirmUser()
    {
        if (Session::get('autenticado')) {
            $this->redireccionar();
        }
        //print_r($_POST);exit;
        $this->_view->assign('titulo', 'Nuevo Password');
        $this->_view->assign('title','Nuevo Password');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$this->getSql('clave') && strlen($this->getSql('clave')) < 8) {
                $this->_view->assign('_error','Ingrese un password de al menos 8 caracteres');
                $this->_view->renderizar('confirmUser');
                exit;
            }

            if ($this->getSql('clave') != $this->getSql('reclave')) {
                $this->_view->assign('_error','Los passwords ingresados no coiinciden');
                $this->_view->renderizar('confirmUser');
                exit;
            }

            $usuario = Usuario::select('id')->find($this->getInt('user'));

            if (!$usuario) {
                $this->_view->assign('_error','El usuario no existe... debe registrarse para continuar');
                $this->_view->renderizar('confirmUser');
                exit;
            }

            $usuario = Usuario::find($this->getInt('user'));
            $usuario->clave = $this->encriptar($this->getSql('clave'));
            $res = $usuario->save();

            if ($res) {
                Session::set('msg_success','El password se ha modificado correctamente');
            }else{
                Session::set('msg_error','El password no se ha modificado... intente nuevamente');
            }

            $this->redireccionar('usuarios/login');
        }

        $this->_view->renderizar('confirmUser');
    }

    public function editPassword($id = null)
    {
        $this->verificarSession();

        if ($this->permiso->actualizar != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->_view->assign('titulo','Cambiar Password');
        $this->_view->assign('title','Cambiar Password');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$this->getSql('claveactual')) {
                $this->_view->assign('_error','Ingrese su password actual');
                $this->_view->renderizar('editPassword');
                exit;
            }

            if (!$this->getSql('clave') && strlen($this->getSql('clave')) < 8) {
                $this->_view->assign('_error','El password debe contener al menos 8 caracteres');
                $this->_view->renderizar('editPassword');
                exit;
            }

            if ($this->getSql('clave') != $this->getSql('reclave')) {
                $this->_view->assign('_error','Los passwords no coinciden');
                $this->_view->renderizar('editPassword');
                exit;
            }

            $usuario = Usuario::select('id')
                        ->where('clave', $this->encriptar($this->getSql('claveactual')))
                        ->find(Session::get('usuario_id'));

            if (!$usuario) {
                $this->_view->assign('_error','El password o el usuario no existe... intente nuevamente');
                $this->_view->renderizar('editPassword');
                exit;
            }

            $usuario = Usuario::find(Session::get('usuario_id'));
            $usuario->clave = $this->encriptar($this->getSql('clave'));
            $res = $usuario->save();

            if ($res) {
                Session::set('msg_success','El password se ha modificado correctamente');
            }else {
                Session::set('msg_error','El password no se ha modificado... intente nuevamente');
            }

            $this->redireccionar('usuarios/perfil');
        }

        $this->_view->renderizar('editPassword');
    }

    public function add()
    {
        $this->verificarSession();

        if ($this->permiso->escribir != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->_view->assign('titulo','Nuevo Usuario');
        $this->_view->assign('title','Nuevo Usuario');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('roles', Rol::select('id','nombre')->orderBy('id','asc')->get());
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));

        if ($this->decrypt($this->getAlphaNum('enviar')) == Session::get('usuario_id')) {
            $this->_view->assign('usuario', $_POST);

            $this->validate('add');
            $this->setting('add');

            $this->redireccionar('usuarios');
        }

        $this->_view->renderizar('add');
    }

    #############################################
    public function validate($vista)
    {
        if (!$this->getSql('rut')) {
           $error = 'Ingrese el rut del usuario';
        }elseif (!$this->getSql('name')) {
            $error = 'Ingrese el nombre del usuario';
        }elseif (!$this->getSql('lastname')) {
            $error = 'Ingrese el apellido del usuario';
        }elseif (!$this->validarEmail($this->getPostParam('email'))) {
            $error = 'Ingrese el email del usuario';
        }elseif (!$this->getSql('phone') && strlen($this->getSql('phone')) < 9) {
            $error = 'El teléfono debe contener al menos 9 dígitos';
        }elseif (!$this->getInt('rol')) {
            $error = 'Seleccione el rol del usuario';
        }

        if ($vista == 'edit') {
            if (!$this->getInt('status')) {
                $error = 'Seleccione el status del usuario';
            }
        }else {
            if (!$this->getSql('clave') && strlen($this->getSql('clave')) < 8) {
                $error = 'El password debe contener al menos 8 caracteres';
            }

            if ($this->getSql('clave') != $this->getSql('reclave')) {
                $msg = 'Los passwords no coinciden';
            }
        }

        if (isset($error)) {
            $this->_view->assign('_error', $error);
            $this->_view->renderizar($vista);
            exit;
        }

        if ($vista == 'edit') {
            $usuario = Usuario::select('id')
                ->where('rut', $this->getSql('rut'))
                ->where('name', $this->getSql('name'))
                ->where('lastname', $this->getSql('lastname'))
                ->where('email', $this->getPostParam('email'))
                ->where('phone', $this->getSql('phone'))
                ->where('rol_id', $this->getInt('rol'))
                ->where('status', $this->getInt('status'))
                ->first();
        }else{
            $usuario = Usuario::select('id')->where('rut', $this->getSql('rut'))->first();
        }

        if ($usuario) {
            if ($vista == 'edit') {
                $error = 'El usuario ingresado ya existe... modifique alguno de los datos para continuar';
            }else {
                $error = 'El usuario ingresado ya existe... intente con otro';
            }

            $this->_view->assign('_error', $error);
            $this->_view->renderizar($vista);
            exit;
        }
    }

    public function setting($view, $data = null)
    {
        if ($view == 'edit') {
            $usuario = Usuario::find($this->filtrarInt($data));
        }else {
            $usuario = new Usuario;
        }

        $usuario->rut = $this->getSql('rut');
        $usuario->name = $this->getSql('name');
        $usuario->lastname = $this->getSql('lastname');
        $usuario->email = $this->getPostParam('email');
        $usuario->phone = $this->getSql('phone');

        if ($view == 'edit') {
            $usuario->status = $this->getInt('status');
        }else {
            $usuario->status = 1;

            $clave = $this->encriptar($this->getSql('clave'));
            $usuario->clave = $clave;
        }

        $usuario->rol_id = $this->getInt('rol');
        $res = $usuario->save();

        if ($res) {
            Session::set('msg_success','El usuario se ha ingresado correctamente');
        }else {
            Session::set('msg_error','El usuario no se ha ingresado... intente nuevamente');
        }
    }

    private function verificarUsuario($id)
    {
        if ($this->filtrarInt($id)) {
            $usuario = Usuario::select('id')->find($this->filtrarInt($id));

            if ($usuario) {
                return true;
            }

        }

        $this->redireccionar('usuarios');
    }

    private function encriptar($clave)
    {
        $clave = Hash::getHash('sha1', $clave, HASH_KEY);

        return $clave;
    }
}