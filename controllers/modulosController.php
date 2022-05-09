<?php
use models\Modulo;

class modulosController extends Controller
{

	public function __construct(){
		$this->verificarSession();
        $this->verificarRolAdmin();
		Session::tiempo();
		parent::__construct();
        $this->tema = 'Módulos del sistema';
	}

	public function index()
	{
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Modulos');
        $this->_view->assign('title', 'Lista de módulos');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('modulos', Modulo::select('id','titulo','descripcion','status')->get());

		$this->_view->renderizar('index');
	}

    public function view($id = null)
    {
        $this->verificarModulo($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Modulo');
        $this->_view->assign('title', 'Detalle de módulo');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('modulo', Modulo::find($this->filtrarInt($id)));

        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        $this->verificarModulo($id);

        $this->_view->assign('titulo', 'Editar Modulo');
        $this->_view->assign('title', 'Editar módulo');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('button', 'Editar');
        $this->_view->assign('modulo', Modulo::find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            $this->validate();

            $modulo = Modulo::select('id')
                    ->where('titulo', $this->getAlphaNum('titulo'))
                    ->where('descripcion', $this->getAlphaNum('descripcion'))
                    ->where('status', $this->getInt('status'))
                    ->first();

            if ($modulo) {
                $this->_view->assign('_error', 'El módulo ingresado ya existe... modifique alguno de los datos para continuar');
                $this->_view->renderizar('edit');
                exit;
            }

            $modulo = Modulo::find($this->filtrarInt($id));
            $modulo->titulo = $this->getAlphaNum('titulo');
            $modulo->descripcion = $this->getAlphaNum('descripcion');
            $modulo->status = $this->getInt('status');
            $res = $modulo->save();

            if ($res) {
                Session::set('msg_success', 'El módulo se ha modificado correctamente');
            }else {
                Session::set('msg_error', 'El módulo no se ha modificado... Intente nuevamente');
            }

            $this->redireccionar('modulos/view/' . $this->filtrarInt($id));

        }

        $this->_view->renderizar('edit');
    }

    public function add()
    {

        $this->_view->assign('titulo', 'Nuevo Modulo');
        $this->_view->assign('title', 'Nuevo módulo');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('button', 'Guardar');
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            $this->validate();

            $modulo = Modulo::select('id')->where('titulo', $this->getAlphaNum('titulo'))->first();

            if ($modulo) {
                $this->_view->assign('_error', 'El módulo ingresado ya existe... intente nuevamente');
                $this->_view->renderizar('add');
                exit;
            }

            $modulo = new Modulo;
            $modulo->titulo = $this->getAlphaNum('titulo');
            $modulo->descripcion = $this->getAlphaNum('descripcion');
            $modulo->status = $this->getInt('status');
            $res = $modulo->save();

            if ($res) {
                Session::set('msg_success', 'El módulo se ha registrado correctamente');
            }else {
                Session::set('msg_error', 'El módulo no se ha registrado... Intente nuevamente');
            }

            $this->redireccionar('modulos');

        }

        $this->_view->renderizar('add');
    }

    #####################################################################
    public function validate()
    {
        if (!$this->getAlphaNum('titulo')) {
            $this->_view->assign('_error', 'Ingrese el título del módulo');
            $this->_view->renderizar('add');
            exit;
        }

        if (!$this->getAlphaNum('descripcion')) {
            $this->_view->assign('_error', 'Ingrese el descripción del módulo');
            $this->_view->renderizar('add');
            exit;
        }

        if (!$this->getInt('status')) {
            $this->_view->assign('_error', 'Seleccione el status del módulo');
            $this->_view->renderizar('add');
            exit;
        }
    }

    private function verificarModulo($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('modulos');
        }

        $modulo = Modulo::select('id')->find($this->filtrarInt($id));

        if (!$modulo) {
            $this->redireccionar('modulos');
        }
    }
}