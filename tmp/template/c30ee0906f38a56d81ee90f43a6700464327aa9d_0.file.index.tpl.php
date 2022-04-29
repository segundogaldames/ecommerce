<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-29 14:01:11
  from '/var/www/html/ecommerce/views/roles/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_626c27e731a683_64221779',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c30ee0906f38a56d81ee90f43a6700464327aa9d' => 
    array (
      0 => '/var/www/html/ecommerce/views/roles/index.tpl',
      1 => 1651255258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_626c27e731a683_64221779 (Smarty_Internal_Template $_smarty_tpl) {
?><main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="icon fa fa-user-plus" aria-hidden="true"></i> Roles
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
roles/add" class="btn btn-outline-dark"><i class="fa fa-plus-square" aria-hidden="true"></i>Crear Rol</a>
            </h1>
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

                <?php if ((isset($_smarty_tpl->tpl_vars['roles']->value)) && count($_smarty_tpl->tpl_vars['roles']->value)) {?>
                    <table id="table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Status</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'rol');
$_smarty_tpl->tpl_vars['rol']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rol']->value) {
$_smarty_tpl->tpl_vars['rol']->do_else = false;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['rol']->value['id'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['rol']->value['nombre'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['rol']->value['descripcion'];?>
</td>
                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['rol']->value['status'] == 1) {?>
                                            <span class="badge badge-success">Activo</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Inactivo</span>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
roles/view/<?php echo $_smarty_tpl->tpl_vars['rol']->value['id'];?>
" class="btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
roles/edit/<?php echo $_smarty_tpl->tpl_vars['rol']->value['id'];?>
"
                                            class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p class="text-info">No hay roles registrados</p>
                <?php }?>
            </div>
        </div>
    </div>
</main><?php }
}
