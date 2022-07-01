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

            $this->validaForm('edit',
                [
                    'nombre' => $this->getTexto('nombre'),
                    'descripcion' => $this->getTexto('descripcion'),
                    'status' => $this->getTexto('status')
                ]
            );


            $rol = Rol::find($this->filtrarInt($id));
            $rol->nombre = $this->getSql('nombre');
            $rol->descripcion = $this->getSql('descripcion');
            $rol->status = $this->getInt('status');
            $res = $rol->save();

            if ($res) {
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

            $this->validaForm('add',
                [
                    'nombre' => $this->getTexto('nombre'),
                    'descripcion' => $this->getTexto('descripcion'),
                    'status' => $this->getTexto('status')
                ]
            );

            $rol = Rol::select('id')->where('nombre',$this->getTexto('nombre'))->first();

            if ($rol) {
                $this->_view->assign('_error','El rol ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            $rol = new Rol;
            $rol->nombre = $this->getSql('nombre');
            $rol->descripcion = $this->getSql('descripcion');
            $rol->status = $this->getInt('status');
            $res = $rol->save();

            if ($res) {
                Session::set('msg_success','El rol se ha registrado correctamente');
            }else{
                Session::set('msg_error','El rol no se ha registrado... intente nuevamente');
            }

            $this->redireccionar('roles');
        }

        $this->_view->renderizar('add');
    }

    #########################################

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
