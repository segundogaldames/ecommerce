<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-16 15:38:58
  from '/var/www/html/veterinaria/views/videos/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_625b1b520aa279_72475070',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5910aa47d15e7c69f4edb6454135d342c2f1311d' => 
    array (
      0 => '/var/www/html/veterinaria/views/videos/index.tpl',
      1 => 1641431479,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_625b1b520aa279_72475070 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/veterinaria/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                    <?php if (((Session::get('autenticado') !== null ))) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Session::get('usuario_roles')->funcionarioRol, 'funcionarioRol');
$_smarty_tpl->tpl_vars['funcionarioRol']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['funcionarioRol']->value) {
$_smarty_tpl->tpl_vars['funcionarioRol']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['funcionarioRol']->value['rol']['nombre'] == 'Administrador(a)') {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
videos/add" class="btn btn-outline-success btn-sm">Crear Video</a>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    <?php }?>
                </h3>

                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php if ((isset($_smarty_tpl->tpl_vars['videos']->value)) && count($_smarty_tpl->tpl_vars['videos']->value)) {?>
                    <table class="table table-hover">
                        <tr>
                            <th>Título</th>
                            <th>Fecha Creación</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['videos']->value, 'video');
$_smarty_tpl->tpl_vars['video']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->do_else = false;
?>
                            <tr>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
videos/view/<?php echo $_smarty_tpl->tpl_vars['video']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['video']->value['titulo'];?>
</a>
                                </td>
                                <td>
                                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['video']->value['created_at'],"%d-%m-%Y");?>

                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                <?php } else { ?>
                    <p class="text-info">No hay videos registrados</p>
                <?php }?>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
