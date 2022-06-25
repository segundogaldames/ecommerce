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
        $this->_view->assign('enviar', $this->encrypt(CTRL));

        if ($this->decrypt($this->getAlphaNum('enviar')) == CTRL) {

            $this->validate('edit');
            $this->setting('edit', $id);

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
        $this->_view->assign('enviar', $this->encrypt(CTRL));

        if ($this->decrypt($this->getAlphaNum('enviar')) == CTRL) {

            $this->validate('add');
            $this->setting('add');
            $this->redireccionar('modulos');

        }

        $this->_view->renderizar('add');
    }

    #####################################################################
    public function validate($vista)
    {
        if (!$this->getAlphaNum('titulo')) {
            $error = 'Ingrese el título del módulo';
        }elseif (!$this->getAlphaNum('descripcion')) {
            $error = 'Ingrese la descripción del módulo';
        }elseif (!$this->getInt('status')) {
            $error = 'Seleccione el status del módulo';
        }

        if (isset($error)) {
            $this->_view->assign('_error', $error);
            $this->_view->renderizar($vista);
            exit;
        }

        if ($vista == 'edit') {
            $modulo = Modulo::select('id')
                ->where('titulo', $this->getAlphaNum('titulo'))
                ->where('descripcion', $this->getAlphaNum('descripcion'))
                ->where('status', $this->getInt('status'))
                ->first();
        }else{
            $modulo = Modulo::select('id')->where('titulo', $this->getAlphaNum('titulo'))->first();
        }

        if ($modulo) {
            if ($vista == 'edit') {
                $error = 'El módulo ingresado ya existe... modifique alguno de los datos para continuar';
            }else {
                $error = 'El módulo ingresado ya existe... intente nuevamente';
            }

            $this->_view->assign('_error', $error);
            $this->_view->renderizar($vista);
            exit;
        }
    }

    public function setting($view, $data = null)
    {
        if ($view == 'edit') {
            $modulo = Modulo::find($this->filtrarInt($data));
        }else{
            $modulo = new Modulo;
        }

        $modulo->titulo = $this->getAlphaNum('titulo');
        $modulo->descripcion = $this->getAlphaNum('descripcion');
        $modulo->status = $this->getInt('status');
        $res = $modulo->save();

        if ($res) {
            Session::set('msg_success', 'El módulo se ha ingresado correctamente');
        }else {
            Session::set('msg_error', 'El módulo no se ha ingresado... Intente nuevamente');
        }
    }

    private function verificarModulo($id)
    {
        if ($this->filtrarInt($id)) {
            $modulo = Modulo::select('id')->find($this->filtrarInt($id));

            if ($modulo) {
                return true;
            }
        }

        $this->redireccionar('modulos');
    }
}