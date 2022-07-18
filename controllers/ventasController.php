<?php
use models\Producto;
use models\Carrito;

class ventasController extends Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $this->_view->assign('enviar', $this->encrypt($this->getForm()));

        $this->_view->renderizar('carritoUsuario');
    }

    public function updateCarrito($producto = null)
    {
        $this->validaForm('ventas/carritoUsuario',[
            'cantidad' => $this->getInt('cantidad')
        ]);

        $producto = Producto::select('id')->where('ruta', $producto)->first();

        if ($this->getInt('cantidad') <= 0) {
            Session::set('msg_error','La cantidad debe ser mayor a cero');
            $this->redireccionar('ventas/carritoUsuario');
        }

        //print_r($producto);exit;

        $carrito = Carrito::select('id')
            ->where('producto_id', $producto->id)
            ->where('usuario_id', Session::get('usuario_id'))
            ->first();

        $carrito = Carrito::find($carrito->id);
        $carrito->cantidad = $this->getInt('cantidad');
        $res = $carrito->save();

        $total = 0;
        $contador = 0;

        if ($res) {
            Session::set('msg_success','Se ha modificado la cantidad del producto seleccionado');
        }

        $this->getCarrito();

        $this->redireccionar('ventas/carritoUsuario');
    }

    public function addCarrito($producto = null)
    {
        $this->validaForm('tienda/producto/'.$producto,[
            'cantidad' => $this->getInt('cantidad')
        ]);

        if (!Session::get('autenticado')) {
            Session::set('msg_error','Debes iniciar session o registrarte para continuar');
            $this->redireccionar('tienda/producto/' . $producto);
        }
        $producto = Producto::where('ruta',$producto)->first();

        //print_r($producto);exit;

        if (!$producto) {
            Session::set('msg_error','El producto no se ha encontrado');
            $this->redireccionar('tienda');
        }

        if ($this->getInt('cantidad') <= 0) {
            Session::set('msg_error','La cantidad debe ser mayor a cero');
            $this->redireccionar('tienda/producto/' . $producto);
        }

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
            $this->getCarrito();

            Session::set('msg_success','El producto se ha agregado a tu carro de compras');
            $this->redireccionar('tienda');
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

        $this->getCarrito();

        $this->redireccionar('ventas/carritoUsuario');
    }

    public function procesarPago()
    {
        if (!Session::get('autenticado')) {
            Session::set('msg_error','Debes iniciar sesión o registrarte para continuar');
            $this->redireccionar('login/login');
        }

        $this->getCarrito();
        $this->_view->assign('titulo','Procesar Pago');
        $this->_view->assign('enviar', $this->encrypt($this->getForm()));
        $this->_view->renderizar('procesarPago');
    }

    ########################################################
    private function getCarrito()
    {
        $total = 0;
        $contador = 0;

        $carrito = Carrito::with('producto')
            ->where('usuario_id', Session::get('usuario_id'))
            ->where('status', 1)
            ->get();


        if ($carrito) {

            foreach ($carrito as $carro) {
                $total = $total + ($carro->cantidad * $carro->producto->precio);
                $contador += $carro->cantidad;
                //print_r($total);exit;
            }

            Session::set('carrito', $carrito);
            Session::set('total', $total);
            Session::set('contador', $contador);
        }
    }
}