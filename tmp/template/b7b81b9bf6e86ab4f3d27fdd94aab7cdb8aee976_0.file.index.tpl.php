<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-25 11:03:39
  from '/var/www/html/veterinaria/views/admin/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6266b84b4d8cd7_52529986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7b81b9bf6e86ab4f3d27fdd94aab7cdb8aee976' => 
    array (
      0 => '/var/www/html/veterinaria/views/admin/index.tpl',
      1 => 1648582998,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6266b84b4d8cd7_52529986 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="ftco-section ftco-degree-bg">
    <div class="container">
            <div class="col-md-6 ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <?php if (Helper::getRolAdminSuper()) {?>
                        <h3 class="text-success">Clientes</h3>
                        <div class="list-group mb-2">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
clientes/"
                                class="list-group-item list-group-item-action">Clientes</a>
                        </div>
                    <?php }?>
                    <?php if (Helper::getRolAdmin()) {?>
                        <h3 class="text-success">Comunas</h3>
                        <div class="list-group mb-2">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
comunas/" class="list-group-item list-group-item-action">Comunas</a>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
regiones/" class="list-group-item list-group-item-action">Regiones</a>
                        </div>
                        <h3 class="text-success">Funcionarios</h3>
                        <div class="list-group mb-2">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
funcionarios/"
                                class="list-group-item list-group-item-action">Funcionarios</a>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
roles/" class="list-group-item list-group-item-action">Roles</a>
                        </div>
                    <?php }?>
                    <?php if (Helper::getRolAdminSuper()) {?>
                        <h3 class="text-success">Pacientes</h3>
                         <div class="list-group mb-2">
                             <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pacientes/"
                                 class="list-group-item list-group-item-action">Pacientes</a>

                            <?php if (Helper::getRolAdmin()) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pacientetipos/" class="list-group-item list-group-item-action">Paciente Tipos</a>
                            <?php }?>
                        </div>
                        <h3 class="text-success">Reservas</h3>
                        <div class="list-group mb-2">
                            <?php if (Helper::getRolAdmin()) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
horarios/"
                                    class="list-group-item list-group-item-action">Horarios</a>
                            <?php }?>

                            <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
reservas/" class="list-group-item list-group-item-action">Reservas</a>
                        </div>
                        <h3 class="text-success">Servicios</h3>
                        <div class="list-group mb-2">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
servicios/"
                                class="list-group-item list-group-item-action">Servicios</a>

                            <?php if (Helper::getRolAdmin()) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
serviciotipos/"
                                    class="list-group-item list-group-item-action">Servicio Tipos</a>

                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if (Helper::getRolAdmin()) {?>
                        <h3 class="text-success">Videos</h3>
                        <div class="list-group mb-2">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
videos/" class="list-group-item list-group-item-action">Videos</a>
                        </div>
                    <?php }?>
                </div>
            </div>
    </div>
</section> <!-- .section --><?php }
}
