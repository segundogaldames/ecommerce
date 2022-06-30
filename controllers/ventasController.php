<?php
use models\Producto;
use models\Carrito;

class ventasController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function carritoUsuario()
    {
        $this->verificarSession();

        $this->_view->assign('titulo','Carro de Compra');
        $this->_view->assign('carrito', Carrito::with('producto')->where('usuario_id', Session::get('usuario_id'))->where('status', 1)->get());
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));

        $this->_view->renderizar('carritoUsuario');
    }


    public function addCarrito()
    {
        if (Session::get('autenticado')) {
            $enviar = Session::get('usuario_id');
        }else {
            $enviar = CTRL;
        }

        if ($this->decrypt($this->getAlphaNum('enviar')) == $enviar) {

            $producto = Producto::where('nombre',$this->getTexto('producto'))->first();
            // print_r($producto);exit;

            $this->validate('addCarrito', $producto);
            $this->setting('addCarrito', $producto);
        }
    }

    ##################################################################
    public function validate($view, $data = null)
    {
        if (!$data) {
            $error = 'El producto no se ha encontrado';
            }elseif (!$this->getInt('cantidad')) {
            $error = 'La cantidad debe ser mayor a cero';
        }elseif (!Session::get('autenticado')) {
            $error = 'Debe iniciar sessión o registrarse para continuar';
        }

        if (isset($error)) {
            Session::set('msg_error', $error);
            $this->redireccionar('tienda/producto/' . $data->ruta);
        }
    }

    public function setting($view, $data = null)
    {
        $total = 0;
        $contador = 0;
        $carrito = Carrito::select('id')
            ->where('producto_id', $data->id)
            ->where('usuario_id', Session::get('usuario_id'))
            ->first();

        if ($carrito) {
            $carrito = Carrito::find($carrito->id);
            $carrito->cantidad = $this->getInt('cantidad');
            $res = $carrito->save();
        }else {
            $carrito = new Carrito;
            $carrito->producto_id = $data->id;
            $carrito->cantidad = $this->getInt('cantidad');
            $carrito->usuario_id = Session::get('usuario_id');
            $carrito->status = 1;
            $res = $carrito->save();
        }

        if ($res) {
            $carrito = Carrito::with('producto')
                ->where('usuario_id', Session::get('usuario_id'))
                ->where('status', 1)
                ->get();


            if ($carrito) {

                foreach ($carrito as $carr) {
                    $total = $total + ($carr->cantidad * $carr->producto->precio);
                    //print_r($total);exit;
                }

                $contador = Carrito::count();

                Session::set('msg_success','El producto se ha agregado a su carro de compras');
                Session::set('carrito', $carrito);
                Session::set('total', $total);
                Session::set('contador', $contador);

                //print_r(Session::get('total'));exit;

                $this->redireccionar('tienda');
            }
        }
    }
}
