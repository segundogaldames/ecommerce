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

    public function view($id = null)
    {

    }

    public function carritoUsuario()
    {
        $this->verificarSession();
        $this->verificarMensajes();

        $total = 0;
        $contador = 0;

        $carrito = Carrito::with('producto')->where('usuario_id', Session::get('usuario_id'))->where('status', 1)->get();

        foreach ($carrito as $carro) {
            $total = $total + ($carro->cantidad * $carro->producto->precio);
            $contador += $carro->cantidad;
        }

        $this->_view->assign('titulo','Carro de Compra');
        $this->_view->assign('carrito', $carrito);
        $this->_view->assign('total', $total);
        $this->_view->assign('enviar', $this->encrypt(Session::get('usuario_id')));

        $this->_view->renderizar('carritoUsuario');
    }

    public function updateCarrito()
    {
        if ($this->decrypt($this->getAlphaNum('enviar')) == Session::get('usuario_id')) {
            if ($this->getInt('cantidad') <= 0) {
                Session::set('msg_error','La cantidad debe ser mayor a cero');
                $this->redireccionar('ventas/carritoUsuario');
            }

            $producto = Producto::select('id')->where('ruta', $this->getTexto('producto'))->first();

            //print_r($producto);exit;

            $carrito = Carrito::select('id')->where('producto_id', $producto->id)->where('usuario_id', Session::get('usuario_id'))->first();

            $carrito = Carrito::find($carrito->id);
            $carrito->cantidad = $this->getInt('cantidad');
            $res = $carrito->save();

            $total = 0;
            $contador = 0;

            if ($res) {
               Session::set('msg_success','Se ha modificado la cantidad solicitada');
            }

            $total = 0;
            $contador = 0;

            $carrito = Carrito::with('producto')->where('usuario_id', Session::get('usuario_id'))->where('status', 1)->get();

            foreach ($carrito as $carro) {
                $total = $total + ($carro->cantidad * $carro->producto->precio);
                $contador += $carro->cantidad;
            }

            Session::set('carrito', $carrito);
            Session::set('total', $total);
            Session::set('contador', $contador);

            $this->redireccionar('ventas/carritoUsuario');
        }
    }

    public function edit($id = null)
    {

    }

    public function update($id = null)
    {

    }

    public function addCarrito()
    {
        //print_r($_POST);exit;
        if (Session::get('autenticado')) {
            $enviar = Session::get('usuario_id');
        }else {
            $enviar = 'addCarrito'.CTRL;
        }

        if ($this->decrypt($this->getAlphaNum('enviar')) == $enviar) {
            //print_r($_POST);exit;
            $producto = Producto::where('nombre',$this->getTexto('producto'))->first();
            //print_r($producto);exit;

            if (!$producto) {
                $error = 'El producto no se ha encontrado';
            }elseif (!$this->getInt('cantidad')) {
                $error = 'La cantidad debe ser mayor a cero';
            }elseif (!Session::get('autenticado')) {
                $error = 'Debe iniciar sessión o registrarse para continuar';
            }

            if (isset($error)) {
                Session::set('msg_error', $error);
                $this->redireccionar('tienda/producto/' . $producto->ruta);
            }

            $total = 0;
            $contador = 0;

            $carrito = Carrito::select('id')
                ->where('producto_id', $producto->id)
                ->where('usuario_id', Session::get('usuario_id'))
                ->first();

            if ($carrito) {
                $carrito = Carrito::find($carrito->id);
                $carrito->cantidad = $this->getInt('cantidad');
                $res = $carrito->save();
            }else {
                $carrito = new Carrito;
                $carrito->producto_id = $producto->id;
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
                        $contador += $carr->cantidad;
                        //print_r($total);exit;
                    }

                    //$contador = Carrito::count();

                    Session::set('msg_success','El producto se ha agregado a tu carro de compras');
                    Session::set('carrito', $carrito);
                    Session::set('total', $total);
                    Session::set('contador', $contador);

                    //print_r(Session::get('total'));exit;

                    $this->redireccionar('tienda');
                }
            }
        }
    }

    public function deleteProducto($ruta = null)
    {
        $producto = Producto::select('id')->where('ruta', $ruta)->first();

        if ($producto) {
            $carrito = Carrito::where('producto_id', $producto->id)->where('usuario_id', Session::get('usuario_id'))->first();
            if ($carrito) {
                $carrito->delete();
            }
        }
        $total = 0;
        $contador = 0;

        $carrito = Carrito::with('producto')->where('usuario_id', Session::get('usuario_id'))->where('status',1)->get();

        if ($carrito) {

            foreach ($carrito as $carr) {
            $total = $total + ($carr->cantidad * $carr->producto->precio);
            $contador += $carr->cantidad;
            //print_r($total);exit;
            }

        //$contador = Carrito::count();

            Session::set('msg_success','El producto se ha eliminado del carrito');
            Session::set('carrito', $carrito);
            Session::set('total', $total);
            Session::set('contador', $contador);
        }

        $this->redireccionar('ventas/carritoUsuario');
    }

    public function add()
    {

    }

    public function new()
    {

    }
}
