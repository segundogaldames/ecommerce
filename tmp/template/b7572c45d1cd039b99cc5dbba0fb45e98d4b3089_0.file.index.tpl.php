<?php
/* Smarty version 4.0.0-rc.0, created on 2022-06-24 14:23:21
  from '/var/www/html/ecommerce/views/index/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_62b601199085a6_54306080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7572c45d1cd039b99cc5dbba0fb45e98d4b3089' => 
    array (
      0 => '/var/www/html/ecommerce/views/index/index.tpl',
      1 => 1656094999,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:link_css.tpl' => 1,
    'file:header_shop.tpl' => 1,
    'file:slider_shop.tpl' => 1,
    'file:banner_shop.tpl' => 1,
    'file:footer_shop.tpl' => 1,
    'file:link_js.tpl' => 1,
  ),
),false)) {
function content_62b601199085a6_54306080 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <?php $_smarty_tpl->_subTemplateRender("file:link_css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <?php $_smarty_tpl->_subTemplateRender("file:header_shop.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!-- Slider -->
    <?php $_smarty_tpl->_subTemplateRender("file:slider_shop.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!-- Banner -->
    <?php $_smarty_tpl->_subTemplateRender("file:banner_shop.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Productos Nuevos
                </h3>
                <hr>
            </div>

            <div class="row isotope-grid">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['imagenes']->value, 'imagen');
$_smarty_tpl->tpl_vars['imagen']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['imagen']->value) {
$_smarty_tpl->tpl_vars['imagen']->do_else = false;
?>

                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/productos/<?php echo $_smarty_tpl->tpl_vars['imagen']->value['img'];?>
" alt="IMG-PRODUCT">

                                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
tienda/producto/<?php echo $_smarty_tpl->tpl_vars['imagen']->value['producto']['ruta'];?>
"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    Ver Detalle
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
tienda/producto/<?php echo $_smarty_tpl->tpl_vars['imagen']->value['producto']['ruta'];?>
" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['imagen']->value['producto']['nombre'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

                                    </a>

                                    <span class="stext-105 cl3">
                                        $ <?php ob_start();
echo number_format($_smarty_tpl->tpl_vars['imagen']->value['producto']['precio'],0,",",".");
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>

                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_shop'];?>
images/icons/icon-heart-01.png"
                                            alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Load More
                </a>
            </div>
        </div>
    </section>


    <?php $_smarty_tpl->_subTemplateRender("file:footer_shop.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:link_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>

</html><?php }
}
