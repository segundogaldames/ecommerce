<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-25 11:06:38
  from '/var/www/html/veterinaria/views/reservas/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6266b8fe952867_22689313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '410c2c9bae1fecc5310048f53777b836b9b4c53e' => 
    array (
      0 => '/var/www/html/veterinaria/views/reservas/view.tpl',
      1 => 1650065920,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_6266b8fe952867_22689313 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/veterinaria/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                </h3>

                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <table class="table table-hover">
                    <tr>
                        <th>Fecha:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reserva']->value['fecha'],"%d-%m-%Y");?>
</td>
                    </tr>
                    <tr>
                        <th>Hora:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['horario']['rango_hora'];?>
</td>
                    </tr>
                    <tr>
                        <th>Paciente:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['nombre_paciente'];?>
</td>
                    </tr>
                    <tr>
                        <th>Tipo Paciente:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['pacienteTipo']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Cliente:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['nombre_cliente'];?>
</td>
                    </tr>
                    <tr>
                        <th>Tipo de Servicio:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['servicioTipo']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Veterinario(a):</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['funcionario']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['reservaStatus']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Reservado Por:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['usuario']['funcionario']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reserva']->value['created_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reserva']->value['updated_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                </table>
                <p>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
reservas/" class="btn btn-outline-primary btn-sm">Volver</a>

                    <?php if (Helper::getRolAdminSuper()) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
reservas/edit/<?php echo $_smarty_tpl->tpl_vars['reserva']->value['id'];?>
"
                            class="btn btn-outline-primary btn-sm">Cambiar Status</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
clientes"
                            class="btn btn-outline-success btn-sm">Ver Clientes</a>
                    <?php }?>
                </p>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
