<?php
/* Smarty version 4.0.0-rc.0, created on 2022-06-24 14:18:47
  from '/var/www/html/ecommerce/views/layout/default/template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_62b600074d31b7_49302455',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f9150afc6ac375bbbbe8d618e7b99c0860924e8' => 
    array (
      0 => '/var/www/html/ecommerce/views/layout/default/template.tpl',
      1 => 1656094719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b600074d31b7_49302455 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
   <head>
   	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Tienda virtual">

    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['titulo']->value ?? null)===null||$tmp==='' ? "Tienda Virtual" ?? null : $tmp);?>
</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <!-- Favicons
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
style.css">

     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">




   </head>
   <body>


      <div class="content">
            <noscript><p>Debe tener el soporte de Javascript habilitado</p></noscript>

            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
          </div>

<!-- Essential javascripts for application to work-->

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
main.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
fontawesome.js"><?php echo '</script'; ?>
>
    <!-- The javascript plugin to display page loading on top-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
plugins/pace.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
funciones.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" language="javascript"
      src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" language="javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" language="javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" language="javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"><?php echo '</script'; ?>
>

    <?php if ((isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])) && count($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])) {?>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_layoutParams']->value['js'], 'js');
$_smarty_tpl->tpl_vars['js']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->do_else = false;
?>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
"><?php echo '</script'; ?>
>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php }?>
  </body>
</html><?php }
}
