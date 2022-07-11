<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    {include file="link_css.tpl"}
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    {include file="header_shop.tpl"}

    <!-- breadcrumb -->
    <div class="container mt-5">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{$_layoutParams.root}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Carro de Compra
            </span>
        </div>
    </div>


    <!-- Shoping Cart -->


    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                {include file="../partials/_mensajes.tpl"}
                {if isset($carrito) && count($carrito)}
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Producto</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Precio</th>
                                    <th class="column-4">Cantidad</th>
                                    <th class="column-5">Total</th>
                                    <th class="column-3"></th>
                                </tr>
                                {foreach from=$carrito item=$carro}
                                    <form action="{$_layoutParams.root}ventas/updateCarrito/{{$carro.producto.ruta}} " method="post">
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <a href="{$_layoutParams.root}ventas/deleteProducto/{$carro.producto.ruta}"
                                                    title="Eliminar">
                                                    <div class="how-itemcart1">
                                                        {foreach from=$carro->producto->imagenes item=imagen}
                                                            {if $imagen.portada == 1}
                                                                <img src="{$_layoutParams.root}public/img/productos/{$imagen.img}"
                                                                    alt="IMG">

                                                            {/if}
                                                        {/foreach}
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="column-2">
                                                <a href="{$_layoutParams.root}tienda/producto/{$carro.producto.ruta}">
                                                    {{$carro.producto.nombre}}
                                                </a>
                                            </td>
                                            <td class="column-3">$ {{$carro.producto.precio|number_format:0:",":"."}} </td>
                                            <td class="column-4">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                        name="cantidad" value="{$carro.cantidad}">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column-5">
                                                {assign var = 'valor' value = $carro.producto.precio * $carro.cantidad}

                                                $ {{$valor|number_format:0:",":"."}}
                                            </td>
                                            <td>
                                                <input type="hidden" name="enviar" value="{$enviar}">
                                                <button type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                    </form>
                                {/foreach}


                            </table>

                        </div>
                    </div>
                {else}
                    <p class="text-info">Tu carrito está vacío</p>
                {/if}
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Totales
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                $ {{$total|number_format:0:",":"."}}
                            </span>
                        </div>
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Envio:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                {{assign var="envio" value=10 }}
                                $ {{$envio|number_format:0:",":"."}}
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                {{assign var="pago" value= $total + $envio}}
                                $ {{$pago|number_format:0:",":"."}}
                            </span>
                        </div>
                    </div>
                        <a href="{$_layoutParams.root}ventas/procesarPago"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Procesar Pago
                        </a>
                </div>
            </div>
        </div>
    </div>


    {include file="footer_shop.tpl"}

    {include file="link_js.tpl"}

</body>

</html>