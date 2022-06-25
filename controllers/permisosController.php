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
        $this->_view->assign('enviar', $this->encrypt(CTRL));

        if ($this->decrypt($this->getAlphaNum('enviar')) == CTRL) {

            $this->validate('edit', $id);
            $this->setting('edit', $id);

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
        $this->_view->assign('enviar', $this->encrypt(CTRL));

        if ($this->decrypt($this->getAlphaNum('enviar')) == CTRL) {
            $this->_view->assign('permiso', $_POST);

            $this->validate('add', $rol);
            $this->setting('add', $rol);

            $this->redireccionar('permisos/permisosRol/' . $this->filtrarInt($rol));
        }

        $this->_view->renderizar('add');
    }

    #############################################################
    public function validate($vista, $data = null)
    {
        if ($vista == 'add') {
            if (!$this->getInt('modulo')) {
            $error = 'Seleccione el módulo';
            }
        }

        if (!$this->getInt('leer')) {
            $error = 'Seleccione una opción de lectura';
        }elseif (!$this->getInt('escribir')) {
            $error = 'Seleccione una opción de escritura';
        }elseif (!$this->getInt('actualizar')) {
            $error = 'Seleccione una opción de actualización';
        }elseif (!$this->getInt('eliminar')) {
            $error = 'Seleccione una opción de eliminación';
        }



        if (isset($error)) {
            $this->_view->assign('_error', $error);
            $this->_view->renderizar($vista);
            exit;
        }

        if ($vista == 'edit') {
            $permiso = Permiso::select('id')
                ->where('leer', $this->getInt('leer'))
                ->where('escribir', $this->getInt('escribir'))
                ->where('actualizar', $this->getInt('actualizar'))
                ->where('eliminar', $this->getInt('eliminar'))
                ->find($this->filtrarInt($data));
        }else {
            $permiso = Permiso::select('id')
                ->where('modulo_id', $this->getInt('modulo'))
                ->where('rol_id', $this->filtrarInt($data))
                ->first();
        }

        if ($permiso) {
            if ($vista == 'edit') {
                $error = 'El permiso ingresado ya existe... modifique alguno de los datos para continuar';
            }else {
                $error = 'El permiso ingresado ya existe... intente con otro';
            }

            $this->_view->assign('_error', $error);
            $this->_view->renderizar($vista);
            exit;
        }
    }

    public function setting($view, $data)
    {
        if ($view == 'edit') {
            $permiso = Permiso::find($this->filtrarInt($data));
        }else{
            $permiso = new Permiso;
        }

        $permiso->leer = $this->getInt('leer');
        $permiso->escribir = $this->getInt('escribir');
        $permiso->actualizar = $this->getInt('actualizar');
        $permiso->eliminar = $this->getInt('eliminar');

        if ($view == 'add') {
            # code...
            $permiso->modulo_id = $this->getInt('modulo');
            $permiso->rol_id = $this->filtrarInt($data);
        }

        $res = $permiso->save();

        if ($res) {
            Session::set('msg_success','Los permisos se han ingresado correctamente');
        }else {
            Session::set('msg_error','Los permisos no se han ingresado... intente nuevamente');
        }

    }

    private function verificarPermiso($id)
    {
        if ($this->filtrarInt($id)) {
            $permiso = Permiso::select('id')->find($this->filtrarInt($id));

            if ($permiso) {
                return true;
            }

        }

        $this->redireccionar('roles');
    }

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