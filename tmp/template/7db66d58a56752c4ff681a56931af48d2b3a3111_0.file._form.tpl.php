<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-25 11:08:55
  from '/var/www/html/veterinaria/views/pacientes/_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6266b98773c7f6_93351741',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7db66d58a56752c4ff681a56931af48d2b3a3111' => 
    array (
      0 => '/var/www/html/veterinaria/views/pacientes/_form.tpl',
      1 => 1641859696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6266b98773c7f6_93351741 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="" method="post">
    <div class="mb-3">
        <label for="name" class="label text-success" style="font-weight: bold; font-size: 14px;">Nombre <span
                class="text-danger">*</span></label>
        <input type="text" name="nombre" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['paciente']->value['nombre'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id=""
            aria-describedby="" placeholder="Nombre del paciente">
    </div>
    <div class="mb-3">
        <label for="codigo_chip" class="label text-success" style="font-weight: bold; font-size: 14px;">Chip (opcional)</span></label>
        <input type="text" name="codigo_chip" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['paciente']->value['codigo_chip'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id=""
            aria-describedby="" placeholder="Código chip del paciente">
    </div>
    <div class="mb-3">
        <label for="edad" class="label text-success" style="font-weight: bold; font-size: 14px;">Edad (años) <span
                class="text-danger">*</span></label>
        <input type="number" name="edad" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['paciente']->value['edad'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id=""
            aria-describedby="" placeholder="Edad del paciente (en años)">
    </div>

    <div class="mb-3">
        <label for="tamanio" class="label text-success" style="font-weight: bold; font-size: 14px;">Tamaño <span
                class="text-danger">*</span></label>
        <select name="tamanio" class="form-control">
            <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Editar') {?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['paciente']->value['tamanio'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['paciente']->value['tamanio'] == 1) {?>
                        Pequeño
                    <?php } elseif ($_smarty_tpl->tpl_vars['paciente']->value['tamanio'] == 2) {?>
                        Mediano
                    <?php } else { ?>
                        Grande
                    <?php }?>
                </option>
            <?php }?>

            <option value="">Seleccione...</option>
            <option value="1">Pequeño</option>
            <option value="2">Mediano</option>
            <option value="3">Grande</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="peso" class="label text-success" style="font-weight: bold; font-size: 14px;">Peso (kg) <span
                class="text-danger">*</span></label>
        <input type="text" name="peso" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['paciente']->value['peso'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id=""
            aria-describedby="" placeholder="Peso del paciente (en kilogramos)">
    </div>

    <div class="mb-3">
        <label for="tipo" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo Paciente <span
                class="text-danger">*</span></label>
        <select name="tipo" class="form-control">
            <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Editar') {?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['paciente']->value['paciente_tipo_id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['paciente']->value['pacienteTipo']['nombre'];?>

                </option>
            <?php }?>

            <option value="">Seleccione...</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipos']->value, 'tipo');
$_smarty_tpl->tpl_vars['tipo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value) {
$_smarty_tpl->tpl_vars['tipo']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tipo']->value['nombre'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <input type="hidden" name="enviar" value="<?php echo $_smarty_tpl->tpl_vars['enviar']->value;?>
">
    <button type="submit" class="btn btn-outline-success"><?php echo $_smarty_tpl->tpl_vars['button']->value;?>
</button>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];
echo $_smarty_tpl->tpl_vars['ruta']->value;?>
" class="btn btn-outline-primary">Volver</a>
</form><?php }
}
