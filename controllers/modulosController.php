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
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));

        if ($this->decrypt($this->getAlphaNum('enviar')) == Session::get('usuario_id')) {

            $this->validaForm('edit',[
                'titulo' => $this->getTexto('titulo'),
                'descripcion' => $this->getTexto('descripcion'),
                'status' => $this->getTexto('status')
            ]);

            $modulo = Modulo::find($this->filtrarInt($id));
            $modulo->titulo = $this->getTexto('titulo');
            $modulo->descripcion = $this->getTexto('descripcion');
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
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));

        if ($this->decrypt($this->getAlphaNum('enviar')) == Session::get('usuario_id')) {
            $this->_view->assign('modulo', $_POST);

            $this->validaForm('add',[
                'titulo' => $this->getTexto('titulo'),
                'descripcion' => $this->getTexto('descripcion'),
                'status' => $this->getTexto('status')
            ]);

            $modulo = Modulo::select('id')->where('titulo', $this->getAlphaNum('titulo'))->first();

            if ($modulo) {
                $this->_view->assign('_error','El módulo ingresado ya existe... intente con otro');
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