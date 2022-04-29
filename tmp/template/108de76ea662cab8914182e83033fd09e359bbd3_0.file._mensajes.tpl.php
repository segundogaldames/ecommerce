<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-26 14:19:19
  from '/var/www/html/ecommerce/views/partials/_mensajes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_626837a7a7da49_69520824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '108de76ea662cab8914182e83033fd09e359bbd3' => 
    array (
      0 => '/var/www/html/ecommerce/views/partials/_mensajes.tpl',
      1 => 1636417436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626837a7a7da49_69520824 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['_error']->value))) {?>
    <div style="margin-top: 40px;"></div>
    <p class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['_error']->value;?>
</p>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['_mensaje']->value))) {?>
    <div style="margin-top: 40px;"></div>
    <p class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['_mensaje']->value;?>
</p>
<?php }
}
}
