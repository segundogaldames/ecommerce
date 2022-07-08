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
        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Editar Modulo');
        $this->_view->assign('title', 'Editar módulo');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('button', 'Editar');
        $this->_view->assign('ruta', 'modulos/update/' . $id);
        $this->_view->assign('modulo', Modulo::find($this->filtrarInt($id)));
        $this->_view->assign('enviar', $this->encrypt($this->getForm()));

        $this->_view->renderizar('edit');
    }

    public function update($id = null)
    {
        $this->validaPUT();

        $this->validaForm('modulos/edit/'.$id,[
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

    public function add()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Nuevo Modulo');
        $this->_view->assign('title', 'Nuevo módulo');
        $this->_view->assign('tema', $this->tema);
        $this->_view->assign('button', 'Guardar');
        $this->_view->assign('ruta', 'modulos/new');
        $this->_view->assign('modulo', Session::get('dato'));
        $this->_view->assign('enviar', $this->encrypt($this->getForm()));

        $this->_view->renderizar('add');
    }

    public function new()
    {
        $this->validaForm('modulos/add',[
            'titulo' => $this->getTexto('titulo'),
            'descripcion' => $this->getTexto('descripcion'),
            'status' => $this->getTexto('status')
        ]);

        $modulo = Modulo::select('id')->where('titulo', $this->getAlphaNum('titulo'))->first();

        if ($modulo) {
            Session::set('msg_error','El módulo ingresado ya existe... intente con otro');
            $this->redireccionar('modulos/add');
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