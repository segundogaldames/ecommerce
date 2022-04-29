<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-16 15:58:13
  from '/var/www/html/veterinaria/views/servicios/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_625b1fd5aea583_13066865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02d99447a1bd8211683d0ad0783a10c43a315d4b' => 
    array (
      0 => '/var/www/html/veterinaria/views/servicios/view.tpl',
      1 => 1650139091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_625b1fd5aea583_13066865 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <th>Descripción:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['servicio']->value['descripcion'];?>
</td>
                    </tr>
                    <tr>
                        <th>Urgencia:</th>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['servicio']->value['urgencia'] == 1) {?>
                                Si
                            <?php } else { ?>
                                No
                            <?php }?>
                        </td>
                    </tr>
                     <tr>
                         <th>Status:</th>
                         <td>
                             <?php if ($_smarty_tpl->tpl_vars['servicio']->value['status'] == 1) {?>
                                 Pendiente
                             <?php } else { ?>
                                 Realizado
                             <?php }?>
                         </td>
                    </tr>
                    <tr>
                        <th>Paciente:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['servicio']->value['paciente']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Asignado A:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['servicio']->value['funcionario']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Tipo de Servicio:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['servicio']->value['servicioTipo']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Horario:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['servicio']->value['horario']['rango_hora'];?>
</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['servicio']->value['created_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['servicio']->value['updated_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                </table>
                <p>
                    <?php if (Helper::getRolAdminVeterinario()) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
servicios/edit/<?php echo $_smarty_tpl->tpl_vars['servicio']->value['id'];?>
" class="btn btn-outline-primary btn-sm">Editar</a>
                    <?php }?>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pacientes/view/<?php echo $_smarty_tpl->tpl_vars['servicio']->value['paciente_id'];?>
" class="btn btn-outline-primary btn-sm">Volver</a>
                     <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
servicios"
                        class="btn btn-outline-primary btn-sm">Servicios</a>
                </p>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
