<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-16 15:58:20
  from '/var/www/html/veterinaria/views/servicios/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_625b1fdc8f4fe7_88050799',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70c3dbec6cad71e44fce28cb43bf45e1aba7a43c' => 
    array (
      0 => '/var/www/html/veterinaria/views/servicios/index.tpl',
      1 => 1650135957,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_625b1fdc8f4fe7_88050799 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/veterinaria/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-10 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                </h3>

                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php if ((isset($_smarty_tpl->tpl_vars['servicios']->value)) && count($_smarty_tpl->tpl_vars['servicios']->value)) {?>
                    <table class="table table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Tipo de Servicio</th>
                            <th>Paciente</th>
                            <th>RUT Cliente</th>
                            <th>Asignado A</th>
                            <th>Fecha - Horario</th>
                            <th>Status</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['servicios']->value, 'servicio');
$_smarty_tpl->tpl_vars['servicio']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['servicio']->value) {
$_smarty_tpl->tpl_vars['servicio']->do_else = false;
?>
                            <tr>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
servicios/view/<?php echo $_smarty_tpl->tpl_vars['servicio']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['servicio']->value['id'];?>
</a>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['servicio']->value['servicioTipo']['nombre'];?>
</td>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pacientes/view/<?php echo $_smarty_tpl->tpl_vars['servicio']->value['paciente']['id'];?>
" title="Ver Paciente">
                                        <?php echo $_smarty_tpl->tpl_vars['servicio']->value['paciente']['nombre'];?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
clientes/view/<?php echo $_smarty_tpl->tpl_vars['servicio']->value['paciente']['cliente']['id'];?>
" title="Ver Cliente">
                                        <?php echo $_smarty_tpl->tpl_vars['servicio']->value['paciente']['cliente']['rut'];?>

                                    </a>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['servicio']->value['funcionario']['nombre'];?>
</td>
                                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['servicio']->value['created_at'],"%d-%m-%Y");?>
 - <?php echo $_smarty_tpl->tpl_vars['servicio']->value['horario']['rango_hora'];?>
</td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['servicio']->value['status'] == 1) {?>
                                        Pendiente
                                    <?php } else { ?>
                                        Realizado
                                    <?php }?>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                <?php } else { ?>
                    <p class="text-info">No hay servicios registrados</p>
                <?php }?>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
