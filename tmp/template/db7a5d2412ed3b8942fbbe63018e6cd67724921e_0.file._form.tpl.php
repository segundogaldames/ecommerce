<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-25 11:04:02
  from '/var/www/html/veterinaria/views/reservas/_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6266b86220e654_91019346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db7a5d2412ed3b8942fbbe63018e6cd67724921e' => 
    array (
      0 => '/var/www/html/veterinaria/views/reservas/_form.tpl',
      1 => 1648220983,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6266b86220e654_91019346 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="" method="post">
    <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Guardar') {?>
        <div class="mb-3">
            <label for="nombre_paciente" class="label text-success" style="font-weight: bold; font-size: 14px;">Nombre del Paciente <span
                    class="text-danger">*</span></label>
            <input type="text" name="nombre_paciente" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['reserva']->value['nombre_paciente'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id=""
                aria-describedby="" placeholder="Nombre del paciente">
        </div>
        <div class="mb-3">
            <label for="paciente_tipo" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo Paciente <span class="text-danger">*</span></label>
            <select name="paciente_tipo" class="form-control">
                <option value="">Seleccione...</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pacienteTipos']->value, 'pacienteTipo');
$_smarty_tpl->tpl_vars['pacienteTipo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pacienteTipo']->value) {
$_smarty_tpl->tpl_vars['pacienteTipo']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['pacienteTipo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['pacienteTipo']->value['nombre'];?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre_cliente" class="label text-success" style="font-weight: bold; font-size: 14px;">Nombre del
                Cliente <span class="text-danger">*</span></label>
            <input type="text" name="nombre_cliente" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['reserva']->value['nombre_cliente'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control"
                id="" aria-describedby="" placeholder="Nombre del cliente">
        </div>
        <div class="mb-3">
            <label for="servicio_tipo" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo Servicio
                <span class="text-danger">*</span></label>
            <select name="servicio_tipo" class="form-control">
                <option value="">Seleccione...</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['servicioTipos']->value, 'servicioTipo');
$_smarty_tpl->tpl_vars['servicioTipo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['servicioTipo']->value) {
$_smarty_tpl->tpl_vars['servicioTipo']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['servicioTipo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['servicioTipo']->value['nombre'];?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>
        <div class="mb-3">
            <label for="funcionario" class="label text-success" style="font-weight: bold; font-size: 14px;">Veterinario
                <span class="text-danger">*</span></label>
            <select name="funcionario" class="form-control">
                <option value="">Seleccione...</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['funcionarios']->value, 'funcionario');
$_smarty_tpl->tpl_vars['funcionario']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['funcionario']->value) {
$_smarty_tpl->tpl_vars['funcionario']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['funcionario']->value['funcionario']['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['funcionario']->value['funcionario']['nombre'];?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Editar') {?>
        <div class="mb-3">
            <label for="status" class="label text-success" style="font-weight: bold; font-size: 14px;">Status
                <span class="text-danger">*</span></label>
            <select name="status" class="form-control">
                <option value="<?php echo $_smarty_tpl->tpl_vars['reserva']->value['reserva_status_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['reserva']->value['reservaStatus']['nombre'];?>
</option>

                <option value="">Seleccione...</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['statuses']->value, 'status');
$_smarty_tpl->tpl_vars['status']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value['nombre'];?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>
    <?php }?>
    <input type="hidden" name="enviar" value="<?php echo $_smarty_tpl->tpl_vars['enviar']->value;?>
">
    <button type="submit" class="btn btn-outline-success"><?php echo $_smarty_tpl->tpl_vars['button']->value;?>
</button>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];
echo $_smarty_tpl->tpl_vars['ruta']->value;?>
" class="btn btn-outline-primary">Volver</a>
</form><?php }
}
