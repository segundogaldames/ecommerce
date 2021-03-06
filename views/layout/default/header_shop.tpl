<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                   {if isset(Session::get('autenticado'))}
                        Bienvenid@ {{Session::get('usuario_name')}}
                   {/if}
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        Help & FAQs
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        Mi cuenta
                    </a>

                    {if isset(Session::get('autenticado'))}
                        <a href="{$_layoutParams.root}login/logout" class="flex-c-m trans-04 p-lr-25">Salir
                        </a>
                    {else}
                        <a href="{$_layoutParams.root}login/login" class="flex-c-m trans-04 p-lr-25">Ingresar
                        </a>
                    {/if}
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="{$_layoutParams.root}" class="logo">
                    <img src="{$_layoutParams.ruta_shop}images/icons/logo-01.png" alt="Tienda Virtual">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="{$_layoutParams.root}">Inicio</a>

                        </li>

                        <li>
                            <a href="{$_layoutParams.root}tienda">Tienda</a>
                        </li>

                        <li>
                            <a href="#">Nosotros</a>
                        </li>

                        <li>
                            <a href="#">Contacto</a>
                        </li>
                        {if isset(Session::get('autenticado')) && Helper::getRolAdmin()}
                            <li>
                                <a href="{$_layoutParams.root}admin">Admin</a>
                            </li>
                        {/if}
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                    data-notify="{if isset(Session::get('contador'))}{Session::get('contador')}{else}0{/if}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="{$_layoutParams.root}"><img src="{$_layoutParams.ruta_shop}images/icons/logo-01.png" alt="Tienda Virtual"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                data-notify="{if isset(Session::get('contador'))}{Session::get('contador')}{else}0{/if}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Mensaje de Bienvenida
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Help & FAQs
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Mi cuenta
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Entrar/Salir
                    </a>

                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="{$_layoutParams.root}">Inicio</a>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>

            <li>
                <a href="{$_layoutParams.root}tienda">Tienda</a>
            </li>

            <li>
                <a href="#">Nosotros</a>
            </li>

            <li>
                <a href="#">Contacto</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{$_layoutParams.ruta_shop}images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>

<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Tu Carrito
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                {if isset(Session::get('carrito')) && count(Session::get('carrito'))}
                    {{foreach from=Session::get('carrito') item=carrito }}
                        <li class="header-cart-item flex-w flex-t m-b-12">
                            <a href="{$_layoutParams.root}ventas/deleteProducto/{$carrito.producto.ruta}" title="Eliminar producto">
                                <div class="header-cart-item-img">
                                    {{foreach from=$carrito->producto->imagenes item=imagen}}
                                    {if $imagen.portada == 1}
                                        <img src="{$_layoutParams.root}public/img/productos/{$imagen.img}" alt="IMG">

                                    {/if}
                                    {{/foreach}}
                                </div>

                            </a>

                            <div class="header-cart-item-txt p-t-8">
                                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                {{$carrito.producto.nombre}}
                                </a>

                                <span class="header-cart-item-info">
                                    {{$carrito.cantidad}} x $ {{$carrito.producto.precio|number_format:0:",":"."}}
                                </span>
                            </div>
                        </li>

                    {{/foreach}}
                {{else}}
                    <p class="text-info">Tu carro est?? vac??o</p>
                {/if}


            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: $ {{Session::get('total')|number_format:0:",":"."}}

                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="{$_layoutParams.root}ventas/carritoUsuario"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        Ver Carro
                    </a>

                    <a href="{$_layoutParams.root}ventas/procesarPago"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Procesar Pago
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>