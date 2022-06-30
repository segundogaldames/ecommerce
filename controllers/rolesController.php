<?php
use models\Rol;

class rolesController extends Controller
{
    public function __construct()
    {
        $this->verificarSession();
        Session::tiempo();
        parent::__construct();
        //$this->verificarRolAdmin();
        $this->tema = 'Roles de usuarios';
        $this->permiso = $this->getPermisos('Roles');
    }

    public function index()
    {
        if ($this->permiso->leer != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarMensajes();

        $this->_view->assign('titulo','Roles');
        $this->_view->assign('title','Lista de Roles');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('roles', Rol::select('id','nombre','descripcion','status')->orderBy('id', 'desc')->get());
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        if ($this->permiso->leer != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarRol($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo','Rol');
        $this->_view->assign('title','Detalle Rol');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('rol', Rol::find($this->filtrarInt($id)));
        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        if ($this->permiso->actualizar != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->verificarRol($id);

        $this->_view->assign('titulo','Editar Rol');
        $this->_view->assign('title','Editar Rol');
        $this->_view->assign('button','Editar');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('rol', Rol::find($this->filtrarInt($id)));
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));

        if ($this->decrypt($this->getAlphaNum('enviar')) == Session::get('usuario_id')) {

            $this->validate('edit');
            $this->setting('edit', $id);

            $this->redireccionar('roles/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function add()
    {
        if ($this->permiso->escribir != 1) {
            $this->redireccionar('error/noPermit');
        }

        $this->_view->assign('titulo','Nuevo Rol');
        $this->_view->assign('title','Nuevo Rol');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));

        if ($this->decrypt($this->getAlphaNum('enviar')) == Session::get('usuario_id')) {
            $this->_view->assign('rol', $_POST);

            $this->validate('add');
            $this->setting('add');

            $this->redireccionar('roles');
        }

        $this->_view->renderizar('add');
    }

    #########################################
    public function validate($vista)
    {
        if (!$this->getSql('nombre')) {
           $error = 'Ingrese el nombre del rol';
        }elseif (!$this->getSql('descripcion')) {
            $error = 'Ingrese la descripción del rol';
        }elseif (!$this->getInt('status')) {
            $error = 'Seleccione el status del rol';
        }

        if (isset($error)) {
            $this->_view->assign('_error', $error);
            $this->_view->renderizar($vista);
            exit;
        }

        if ($vista == 'edit') {
            $rol = Rol::select('id')
                ->where('nombre', $this->getSql('nombre'))
                ->where('descripcion', $this->getSql('descripcion'))
                ->where('status', $this->getInt('status'))
                ->first();
        }else{
            $rol = Rol::select('id')->where('nombre', $this->getSql('nombre'))->first();
        }

        if ($rol) {
            if ($vista == 'edit') {
                $error = 'El rol ingresado ya existe... modifique alguno de los datos para continuar';
            }else {
                $error = 'El rol ingresado ya existe... intente nuevamente';
            }

            $this->_view->assign('_error', $error);
            $this->_view->renderizar($vista);
            exit;
        }
    }

    public function setting($view, $data = null)
    {
        if ($view == 'edit') {
            $rol = Rol::find($this->filtrarInt($data));
        }else {
            $rol = new Rol;
        }

        $rol->nombre = $this->getSql('nombre');
        $rol->descripcion = $this->getSql('descripcion');
        $rol->status = $this->getInt('status');
        $res = $rol->save();

        if ($res) {
        # code...
            Session::set('msg_success','El rol se ha ingresado correctamente');
        }else{
            Session::set('msg_error','El rol no se ha ingresado... intente nuevamente');
        }
    }
    /*
    * verifica id de rol
    * @param int id
    * return roles/index
    */

    private function verificarRol($id)
    {
        if ($this->filtrarInt($id)) {
            $rol = Rol::select('id')->find($this->filtrarInt($id));

            if ($rol) {
                return true;
            }

        }

        $this->redireccionar('roles');
    }
}
