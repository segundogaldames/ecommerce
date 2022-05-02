<?php
/* Smarty version 4.0.0-rc.0, created on 2022-05-01 19:33:54
  from '/var/www/html/ecommerce/views/usuarios/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_626f18e2c709a0_27222970',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bef45afcb13d21fbe4afa904eca5923410ab1fbd' => 
    array (
      0 => '/var/www/html/ecommerce/views/usuarios/index.tpl',
      1 => 1651265362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_626f18e2c709a0_27222970 (Smarty_Internal_Template $_smarty_tpl) {
?><main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="icon fa fa-user-plus" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>

                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/add" class="btn btn-outline-dark"><i class="fa fa-user"
                        aria-hidden="true"></i>Crear Usuario</a>
            </h1>
            <p><?php echo $_smarty_tpl->tpl_vars['tema']->value;?>
</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios">Usuarios</a></li>
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

                <?php if ((isset($_smarty_tpl->tpl_vars['usuarios']->value)) && count($_smarty_tpl->tpl_vars['usuarios']->value)) {?>
                    <table id="table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>RUT</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Rol</th>
                                <th>Status</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'usuario');
$_smarty_tpl->tpl_vars['usuario']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['usuario']->value) {
$_smarty_tpl->tpl_vars['usuario']->do_else = false;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['id'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['rut'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['name'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['lastname'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['rol']['nombre'];?>
</td>
                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['usuario']->value['status'] == 1) {?>
                                            <span class="badge badge-success">Activo</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Inactivo</span>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/view/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['id'];?>
" class="btn"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/edit/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['id'];?>
" class="btn"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p class="text-info">No hay usuarios registrados</p>
                <?php }?>
            </div>
        </div>
    </div>
</main><?php }
}
