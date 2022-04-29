<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-25 11:03:44
  from '/var/www/html/veterinaria/views/reservas/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6266b8504ea529_71860750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3402861cc084ecda1e88d0e2d12493c5ca5ab2dc' => 
    array (
      0 => '/var/www/html/veterinaria/views/reservas/index.tpl',
      1 => 1648503187,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 2,
  ),
),false)) {
function content_6266b8504ea529_71860750 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/veterinaria/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
                        <div class="col-md-8 ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3>
                        <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                    </h3>

                    <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    <?php if ((isset($_smarty_tpl->tpl_vars['reservas']->value)) && count($_smarty_tpl->tpl_vars['reservas']->value)) {?>
                        <table class="table table-hover">
                            <tr>
                                <th>Fecha</th>
                                <th>Horario</th>
                                <th>Tipo de Servicio</th>
                                <th>Tipo de Paciente</th>
                                <th>Veterinario</th>
                                <th>Status</th>
                                <th>Reservado Por</th>
                            </tr>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reservas']->value, 'reserva');
$_smarty_tpl->tpl_vars['reserva']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['reserva']->value) {
$_smarty_tpl->tpl_vars['reserva']->do_else = false;
?>
                                <tr>
                                    <td>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
reservas/view/<?php echo $_smarty_tpl->tpl_vars['reserva']->value['id'];?>
">
                                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reserva']->value['fecha'],"%d-%m-%Y");?>

                                        </a>
                                    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['horario']['rango_hora'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['servicioTipo']['nombre'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['pacienteTipo']['nombre'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['funcionario']['nombre'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['reservaStatus']['nombre'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['usuario']['funcionario']['nombre'];?>
</td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </table>
                    <?php } else { ?>
                        <p class="text-info">No hay reservas registradas</p>
                    <?php }?>
                </div>
            </div>

                        <div class="col-md-4 ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3>
                        <?php echo $_smarty_tpl->tpl_vars['title_horario']->value;?>

                    </h3>

                    <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                    <form class="form-inline" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
reservas/horariosReserva" method="post">
                         <div class="form-group mx-sm-3 mb-2">
                             <input type="date" name="fecha" class="form-control" id="inputPassword2"
                                 placeholder="Fecha">
                         </div>
                         <input type="hidden" name="enviar" value="<?php echo $_smarty_tpl->tpl_vars['enviar']->value;?>
">
                         <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section> <!-- .section --><?php }
}
