<?php
use models\Permiso;
use models\Modulo;
use models\Rol;

class permisosController extends Controller
{

	public function __construct(){
		$this->verificarSession();
		Session::tiempo();
        $this->verificarRolAdmin();
		parent::__construct();
        $this->tema = 'Permisos de roles y módulos';
	}

	public function index()
	{

	}

    public function permisosRol($rol = null)
    {
        $this->verificarRol($rol);
        $this->verificarMensajes();

        $this->_view->assign('titulo','Permisos Rol');
        $this->_view->assign('title','Permisos');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('permisos', Permiso::with(['rol','modulo'])->where('rol_id', $this->filtrarInt($rol))->get());
        $this->_view->assign('rol', Rol::select('id','nombre')->find($this->filtrarInt($rol)));

        $this->_view->renderizar('permisosRol');
    }

    public function view($id = null)
    {
        $this->verificarPermiso($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo','Permiso Rol');
        $this->_view->assign('title','Detalle Permiso Rol');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('permiso', Permiso::with(['rol','modulo'])->find($this->filtrarInt($id)));

        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        $this->verificarPermiso($id);

        $this->_view->assign('titulo','Editar Permiso');
        $this->_view->assign('title','Editar Permiso');
        $this->_view->assign('button','Editar');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('ruta','permisos/permisosRol/' . $this->filtrarInt($id));
        $this->_view->assign('permiso', Permiso::find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {


            if (!$this->getInt('leer')) {
                $this->_view->assign('_error','Seleccione una opción de lectura');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('escribir')) {
                $this->_view->assign('_error','Seleccione una opción de escritura');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('actualizar')) {
                $this->_view->assign('_error','Seleccione una opción de actualización');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('eliminar')) {
                $this->_view->assign('_error','Seleccione una opción de eliminación');
                $this->_view->renderizar('edit');
                exit;
            }

            $permiso = Permiso::select('id')
                        ->where('leer', $this->getInt('leer'))
                        ->where('escribir', $this->getInt('escribir'))
                        ->where('actualizar', $this->getInt('actualizar'))
                        ->where('eliminar', $this->getInt('eliminar'))
                        ->find($this->filtrarInt($id));

            if ($permiso) {
                $this->_view->assign('_error','El rol y módulo seleccionado ya están asociados... modifique alguno de los datos para continuar');
                $this->_view->renderizar('edit');
                exit;
            }

            $permiso = Permiso::find($this->filtrarInt($id));
            $permiso->leer = $this->getInt('leer');
            $permiso->escribir = $this->getInt('escribir');
            $permiso->actualizar = $this->getInt('actualizar');
            $permiso->eliminar = $this->getInt('eliminar');
            $res = $permiso->save();

            if ($res) {
                Session::set('msg_success','Los permisos se han modificado correctamente');
            }else {
                Session::set('msg_error','Los permisos no se han modificado... intente viewente');
            }

                $this->redireccionar('permisos/view/' . $this->filtrarInt($id));
            }

        $this->_view->renderizar('edit');
    }

    public function add($rol = null)
    {
        $this->verificarRol($rol);

        $this->_view->assign('titulo','Nuevo Permiso');
        $this->_view->assign('title','Nuevo Permiso');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('ruta', 'permisos/permisosRol/' . $this->filtrarInt($rol));
        $this->_view->assign('modulos', Modulo::select('id','titulo')->where('status', 1)->orderBy('titulo','desc')->get());
        $this->_view->assign('rol', Rol::select('id','nombre')->find($this->filtrarInt($rol)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('permiso', $_POST);

            if (!$this->getInt('modulo')) {
                $this->_view->assign('_error','Seleccione el módulo para el permiso');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('leer')) {
                $this->_view->assign('_error','Seleccione una opción de lectura');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('escribir')) {
                $this->_view->assign('_error','Seleccione una opción de escritura');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('actualizar')) {
                $this->_view->assign('_error','Seleccione una opción de actualización');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('eliminar')) {
                $this->_view->assign('_error','Seleccione una opción de eliminación');
                $this->_view->renderizar('add');
                exit;
            }

            $permiso = Permiso::select('id')
                                ->where('modulo_id', $this->getInt('modulo'))
                                ->where('rol_id', $this->filtrarInt($rol))
                                ->first();
            if ($permiso) {
                $this->_view->assign('_error','El rol y módulo seleccionado ya están asociados... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            $permiso = new Permiso;
            $permiso->leer = $this->getInt('leer');
            $permiso->escribir = $this->getInt('escribir');
            $permiso->actualizar = $this->getInt('actualizar');
            $permiso->eliminar = $this->getInt('eliminar');
            $permiso->modulo_id = $this->getInt('modulo');
            $permiso->rol_id = $this->filtrarInt($rol);
            $res = $permiso->save();

            if ($res) {
                Session::set('msg_success','Los permisos se han registrado correctamente');
            }else {
                Session::set('msg_error','Los permisos no se han registrado... intente nuevamente');
            }

            $this->redireccionar('permisos/permisosRol/' . $this->filtrarInt($rol));
        }

        $this->_view->renderizar('add');
    }

    #############################################################
    private function verificarPermiso($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('roles');
        }

        $permiso = Permiso::select('id')->find($this->filtrarInt($id));

        if (!$permiso) {
            $this->redireccionar('roles');
        }
    }

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