<?php
use models\Usuario;

class loginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->tema = 'Ingreso de usuario';
    }

    public function index()
    {

    }

    public function login()
    {
        if (Session::get('autenticado')) {
            $this->redireccionar();
        }
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
                ->where('status', 1)
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
            Session::set('usuario_rol', $usuario->rol->nombre);
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

        $this->redireccionar('login/login');
    }

    #############################################################
    private function encriptar($clave)
    {
        $clave = Hash::getHash('sha1', $clave, HASH_KEY);

        return $clave;
    }
}