<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-25 11:09:37
  from '/var/www/html/veterinaria/views/pacientes/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6266b9b103fec1_22660183',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19de008d57e15f37d4620f57f97c0cefb3f099ad' => 
    array (
      0 => '/var/www/html/veterinaria/views/pacientes/view.tpl',
      1 => 1650135706,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_6266b9b103fec1_22660183 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/veterinaria/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3>
                        <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                    </h3>

                    <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    <table class="table table-hover">
                        <tr>
                            <th>Nombre:</th>
                            <td><?php echo $_smarty_tpl->tpl_vars['paciente']->value['nombre'];?>
</td>
                        </tr>
                        <tr>
                            <th>Código Chip:</th>
                            <td><?php echo $_smarty_tpl->tpl_vars['paciente']->value['codigo_chip'];?>
</td>
                        </tr>
                        <tr>
                            <th>Edad:</th>
                            <td><?php echo $_smarty_tpl->tpl_vars['paciente']->value['edad'];?>
 año(s)</td>
                        </tr>
                        <tr>
                            <th>Tamaño:</th>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['paciente']->value['tamanio'] == 1) {?>
                                    Pequeño
                                <?php } elseif ($_smarty_tpl->tpl_vars['paciente']->value['tamanio'] == 2) {?>
                                    Mediano
                                <?php } else { ?>
                                    Grande
                                <?php }?>
                            </td>
                        </tr>
                        <tr>
                            <th>Peso:</th>
                            <td><?php echo number_format($_smarty_tpl->tpl_vars['paciente']->value['peso'],3);?>
 Kg.</td>
                        </tr>
                        <tr>
                            <th>Paciente Tipo:</th>
                            <td><?php echo $_smarty_tpl->tpl_vars['paciente']->value['pacienteTipo']['nombre'];?>
</td>
                        </tr>
                        <tr>
                            <th>Cliente:</th>
                            <td><?php echo $_smarty_tpl->tpl_vars['paciente']->value['cliente']['nombre'];?>
</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['paciente']->value['created_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['paciente']->value['updated_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                        </tr>
                    </table>
                    <p>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pacientes/edit/<?php echo $_smarty_tpl->tpl_vars['paciente']->value['id'];?>
"
                            class="btn btn-outline-primary btn-sm">Editar</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
clientes/view/<?php echo $_smarty_tpl->tpl_vars['paciente']->value['cliente_id'];?>
" class="btn btn-outline-primary btn-sm">Volver</a>

                        <?php if (Helper::getRolAdminSuper()) {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
servicios/add/<?php echo $_smarty_tpl->tpl_vars['paciente']->value['id'];?>
"
                                class="btn btn-outline-success btn-sm">Agregar Servicio</a>
                        <?php }?>
                    </p>
                </div>
            </div>
                        <div class="col-md-7 ftco-animate">
                                <div class="sidebar-box ftco-animate">
                <h3>Servicios</h3>
                <?php if ((isset($_smarty_tpl->tpl_vars['paciente']->value['servicios'])) && count($_smarty_tpl->tpl_vars['paciente']->value['servicios'])) {?>
                    <table class="table table-hover table-responsive">
                        <tr>
                            <th>Tipo de Servicio</th>
                            <th>Precio</th>
                            <th>Urgencia</th>
                            <th>Status</th>
                            <th>Horario</th>
                            <th>Fecha</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['paciente']->value['servicios'], 'servicio');
$_smarty_tpl->tpl_vars['servicio']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['servicio']->value) {
$_smarty_tpl->tpl_vars['servicio']->do_else = false;
?>
                            <tr>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['servicio']->value['servicioTipo']['nombre'];?>

                                </td>
                                <td>
                                    $ <?php echo number_format($_smarty_tpl->tpl_vars['servicio']->value['servicioTipo']['precio'],0,",",".");?>

                                </td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['servicio']->value['urgencia'] == 1) {?>
                                        Si
                                    <?php } else { ?>
                                        No
                                    <?php }?>
                                </td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['servicio']->value['status'] == 1) {?>
                                        Pendiente
                                    <?php } else { ?>
                                        Realizado
                                    <?php }?>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['servicio']->value['horario']['rango_hora'];?>
</td>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
servicios/view/<?php echo $_smarty_tpl->tpl_vars['servicio']->value['id'];?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['servicio']->value['created_at'],"%d-%m-%Y %H:%M:%S");?>
</a>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    </table>
                <?php } else { ?>
                    <p class="text-info">No hay servicios asociados</p>
                <?php }?>
                </div>
            </div>

        </div>
    </div>
</section> <!-- .section --><?php }
}
