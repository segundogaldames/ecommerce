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
        $this->verificarSession();
        $this->verificarRolAdminSuper();
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
        $this->verificarRolAdminSuper();
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
        $this->verificarRolAdminSuper();
        $this->verificarUsuario($id);

        $this->_view->assign('titulo','Editar Usuario');
        $this->_view->assign('title','Editar Usuario');
        $this->_view->assign('button','Editar');
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
                Session::set('msg_error','El usuario no se ha modificado... intente nuevamente');
            }

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

            if (!$this->getSql('clavea') && strlen($this->getSql('clave')) < 8) {
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
        $this->verificarRolAdminSuper();

        $this->_view->assign('titulo','Nuevo Usuario');
        $this->_view->assign('title','Nuevo Usuario');
        $this->_view->assign('button','Guardar');
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

            if (!$this->getSql('clave') && strlen($this->getSql('clave')) < 8) {
                $this->_view->assign('_error','El password debe contener al menos 8 caracteres');
                $this->_view->renderizar('add');
                exit;
            }

            if ($this->getSql('clave') != $this->getSql('reclave')) {
                $this->_view->assign('_error','Los passwords ingresados no coiinciden');
                $this->_view->renderizar('login');
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
                Session::set('msg_error','El usuario no se ha registrado... intente nuevamente');
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