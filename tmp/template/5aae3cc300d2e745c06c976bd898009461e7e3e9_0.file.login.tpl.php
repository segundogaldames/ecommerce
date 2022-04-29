<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-25 10:55:12
  from '/var/www/html/veterinaria/views/usuarios/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6266b650ea3c33_34372837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5aae3cc300d2e745c06c976bd898009461e7e3e9' => 
    array (
      0 => '/var/www/html/veterinaria/views/usuarios/login.tpl',
      1 => 1639859504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_6266b650ea3c33_34372837 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                </h3>

                <h4 class="text-info">Inicie sesión para continuar</h4>

                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <p class="text-danger">Campos obligatorios *</p>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="email" class="label text-success" style="font-weight: bold; font-size: 14px;">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" id="" aria-describedby=""
                            placeholder="Ingrese su email" onpaste="return false">
                    </div>
                    <div class="mb-3">
                        <label for="clave" class="label text-success" style="font-weight: bold; font-size: 14px;">Password <span
                                class="text-danger">*</span></label>
                        <input type="password" name="clave" class="form-control" id="" aria-describedby=""
                            placeholder="Ingrese su password" onpaste="return false">
                    </div>
                    <div class="mb-3">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/recuperar">¿Olvidaste tu password?</a>
                    </div>
                    <input type="hidden" name="enviar" value="<?php echo $_smarty_tpl->tpl_vars['enviar']->value;?>
">
                    <button type="submit" class="btn btn-outline-success">Ingresar</button>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
" class="btn btn-outline-primary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
