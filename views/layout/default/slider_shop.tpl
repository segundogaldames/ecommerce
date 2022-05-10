<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            {foreach from=$categorias_slider item=slider}
                <div class="item-slick1" style="background-image: url({$_layoutParams.root}public/img/categorias/{$slider.portada}); background-size: 100% 100% ">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    {$slider->descripcion}
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    {$slider.nombre}
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="#"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Ir a la tienda
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            {/foreach}
        </div>
    </div>
</section>