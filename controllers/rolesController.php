<?php
use models\Rol;

class rolesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->verificarSession();
        // $this->verificarRolAdmin();
        $this->tema = 'Roles de usuarios';
    }

    public function index()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo','Roles');
        $this->_view->assign('title','Lista de Roles');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('roles', Rol::select('id','nombre','descripcion','status')->orderBy('id', 'desc')->get());
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
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
        $this->verificarRol($id);

        $this->_view->assign('titulo','Editar Rol');
        $this->_view->assign('title','Editar Rol');
        $this->_view->assign('button','Editar');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('ruta','roles/view/' . $this->filtrarInt($id));
        $this->_view->assign('rol', Rol::find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$this->getSql('nombre')) {
                $this->_view->assign('_error','Ingrese el nombre del rol');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getSql('descripcion')) {
                $this->_view->assign('_error','Ingrese la descripción del rol');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('status')) {
                $this->_view->assign('_error','Seleccione el status del rol');
                $this->_view->renderizar('add');
                exit;
            }

            $rol = Rol::select('id')->where('nombre', $this->getSql('nombre'))->where('descripcion', $this->getSql('descripcion'))->where('status', $this->getInt('status'))->first();

            if ($rol) {
                $this->_view->assign('_error','El rol ingresado ya existe... modifique algunos de los datos para continuar');
                $this->_view->renderizar('edit');
                exit;
            }

            $rol = Rol::find($this->filtrarInt($id));
            $rol->nombre = $this->getSql('nombre');
            $rol->descripcion = $this->getSql('descripcion');
            $rol->status = $this->getInt('status');
            $res = $rol->save();

            if ($res) {
                # code...
                Session::set('msg_success','El rol se ha modificado correctamente');
            }else{
                Session::set('msg_error','El rol no se ha modificado... intente nuevamente');
            }


            $this->redireccionar('roles/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function add()
    {
        $this->_view->assign('titulo','Nuevo Rol');
        $this->_view->assign('title','Nuevo Rol');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('ruta','roles');
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('rol', $_POST);

            if (!$this->getSql('nombre')) {
                $this->_view->assign('_error','Ingrese el nombre del rol');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getSql('descripcion')) {
                $this->_view->assign('_error','Ingrese la descripción del rol');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('status')) {
                $this->_view->assign('_error','Seleccione el status del rol');
                $this->_view->renderizar('add');
                exit;
            }

            $rol = Rol::select('id')->where('nombre', $this->getSql('nombre'))->first();

            if ($rol) {
                $this->_view->assign('_error','El rol ingresado ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            $rol = new Rol;
            $rol->nombre = $this->getSql('nombre');
            $rol->descripcion = $this->getSql('descripcion');
            $rol->status = $this->getInt('status');
            $res = $rol->save();

            if ($res) {
                # code...
                Session::set('msg_success','El rol se ha registrado correctamente');
            }else{
                Session::set('msg_error','El rol no se ha registrado... intente nuevamente');
            }

            $this->redireccionar('roles');
        }

        $this->_view->renderizar('add');
    }

    #########################################
    /*
    * verifica id de rol
    * @param int id
    * return roles/index
    */

    private function verificarRol($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('roles');
        }

        $rol = Rol::select('id')->find($this->filtrarInt($id));

        if (!$rol) {
            $this->redireccionar('roles');
        }
    }
}
