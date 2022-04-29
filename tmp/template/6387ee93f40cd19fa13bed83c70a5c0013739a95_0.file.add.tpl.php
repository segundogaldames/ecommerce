<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-28 21:31:18
  from '/var/www/html/ecommerce/views/usuarios/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_626b3fe6568ad0_74426882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6387ee93f40cd19fa13bed83c70a5c0013739a95' => 
    array (
      0 => '/var/www/html/ecommerce/views/usuarios/add.tpl',
      1 => 1651195875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
    'file:../usuarios/_form.tpl' => 1,
  ),
),false)) {
function content_626b3fe6568ad0_74426882 (Smarty_Internal_Template $_smarty_tpl) {
?><main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="icon fa fa-user-plus" aria-hidden="true"></i> Roles</h1>
            <p>Roles de usuarios</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
roles">Roles</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                </h3>

                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <p class="text-danger">Campos obligatorios</p>
                <?php $_smarty_tpl->_subTemplateRender("file:../usuarios/_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            </div>
        </div>
    </div>
</main><?php }
}
