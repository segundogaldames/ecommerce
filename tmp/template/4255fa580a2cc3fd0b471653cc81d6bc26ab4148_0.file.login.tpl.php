<?php
/* Smarty version 4.0.0-rc.0, created on 2022-05-01 19:30:45
  from '/var/www/html/ecommerce/views/usuarios/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_626f182515c332_26045947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4255fa580a2cc3fd0b471653cc81d6bc26ab4148' => 
    array (
      0 => '/var/www/html/ecommerce/views/usuarios/login.tpl',
      1 => 1651369755,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_626f182515c332_26045947 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>Tienda Virtual</h1>
        </div>
        <div class="login-box">
        <form class="login-form" action="" method="post">
            <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Login</h3>
            <div class="form-group">
                <label class="control-label">Email</label>
                <input name="email" class="form-control" type="email" placeholder="Ingresa tu email" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">Password</label>
                <input class="form-control" type="password" name="clave" placeholder="Ingresa tu password">
            </div>
            <div class="form-group">
                <div class="utility">

                    <p class="semibold-text mb-2"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/resetPassword">¿Olvidaste tu password?</a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <input type="hidden" name="enviar" value="<?php echo $_smarty_tpl->tpl_vars['enviar']->value;?>
">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Login</button>
            </div>
        </form>
    </div>
</section><?php }
}
