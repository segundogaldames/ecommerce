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

            <span class="stext-109 cl4 mb-2">
                Procesar Pago
            </span>
        </div>
    </div>


    <!-- Shoping Cart -->


    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                {include file="../partials/_mensajes.tpl"}

                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div>
                        <label for="direccion">Dirección de envío</label>
                        <div class="bor8 bg0 m-d-12 mb-2">
                            <input type="text" class="stext-111 cl8 plh3 size-111 p-lr-15" name="direcion" placeholder="Dirección de envío">
                        </div>
                        <div class="bor8 bg0 m-b-12 mb-2">
                            <input type="text" class="stext-111 cl8 plh3 size-111 p-lr-15" name="ciudad"
                                placeholder="Ciudad">
                        </div>
                    </div>
                </div>

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
                                $ {{Session::get('total')|number_format:0:",":"."}}
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
                                {{assign var="pago" value= Session::get('total') + $envio}}
                                $ {{$pago|number_format:0:",":"."}}
                            </span>
                        </div>
                    </div>
                    <a href="{$_layoutParams.root}ventas/procesarPago"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Pagar
                    </a>
                </div>
            </div>
        </div>
    </div>


    {include file="footer_shop.tpl"}

    {include file="link_js.tpl"}

</body>

</html>