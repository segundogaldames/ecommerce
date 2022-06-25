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

            <a href="{$_layoutParams.root}tienda/categoria/{$producto.categoria.ruta}" class="stext-109 cl8 hov-cl1 trans-04">
                {{$producto.categoria.nombre}}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                {{$producto.nombre}}
            </span>
        </div>
    </div>


    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                {{foreach from=$producto->imagenes item=imagen}}
                                    <div class="item-slick3"
                                        data-thumb="{$_layoutParams.root}public/img/productos/{$imagen.img}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{$_layoutParams.root}public/img/productos/{$imagen.img}"
                                                alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="{$_layoutParams.root}public/img/productos/{$imagen.img}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                {{/foreach}}

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{$producto.nombre}}
                        </h4>

                        <span class="mtext-106 cl2">
                            ${{$producto.precio|number_format:0:",":"."}}
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            {{$producto.descripcion}}
                        </p>

                        <!--  -->
                        <div class="p-t-33">

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                            name="num-product" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>

                                    <button
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        Agregar al Carro
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                    data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <h3>descripción</h3>
                                <p class="stext-102 cl6">
                                    {{$producto.descripcion}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
            <h3>Productos Relacionados</h3>
        </div>
    </section>


    <!-- Related Products -->
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Productos Relacionados
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    {foreach from=$productos item=producto}
                        {foreach from=$producto->imagenes item=imagen}
                            {if $imagen.portada == 1}
                                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-pic hov-img0">
                                            <img src="{$_layoutParams.root}public/img/productos/{$imagen.img}" alt="IMG-PRODUCT">

                                            <a href="{$_layoutParams.root}tienda/producto/{$imagen.producto.ruta}"
                                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                                Ver Detalle
                                            </a>
                                        </div>

                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l ">
                                                <a href="{$_layoutParams.root}tienda/producto/{$producto.ruta}"
                                                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    {{$imagen.producto.nombre}}
                                                </a>

                                                <span class="stext-105 cl3">
                                                    ${{$imagen.producto.precio}}
                                                </span>
                                            </div>

                                            <div class="block2-txt-child2 flex-r p-t-3">
                                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                    <img class="icon-heart1 dis-block trans-04" src="{$_layoutParams.ruta_shop}images/icons/icon-heart-01.png"
                                                        alt="ICON">
                                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                        src="{$_layoutParams.ruta_shop}images/icons/icon-heart-02.png" alt="ICON">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/if}
                        {/foreach}
                    {/foreach}
                </div>
            </div>
        </div>
    </section>


    {include file="footer_shop.tpl"}

    {include file="link_js.tpl"}

</body>

</html>