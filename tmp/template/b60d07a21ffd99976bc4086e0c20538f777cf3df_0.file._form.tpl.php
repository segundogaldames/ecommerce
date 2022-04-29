<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-16 15:58:36
  from '/var/www/html/veterinaria/views/servicios/_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_625b1fec1d2de9_73233835',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b60d07a21ffd99976bc4086e0c20538f777cf3df' => 
    array (
      0 => '/var/www/html/veterinaria/views/servicios/_form.tpl',
      1 => 1650135395,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_625b1fec1d2de9_73233835 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="" method="post">
    <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Editar') {?>
        <div class="mb-3">
            <label for="descripcion" class="label text-success" style="font-weight: bold; font-size: 14px;">Descripción <span
                    class="text-danger">*</span></label>
            <textarea name="descripcion" class="form-control" rows="10" placeholder="Descripción del servicio" style="resize: none;">
                <?php echo (($tmp = $_smarty_tpl->tpl_vars['servicio']->value['descripcion'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>

            </textarea>
        </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Guardar') {?>
        <div class="mb-3">
            <label for="urgencia" class="label text-success" style="font-weight: bold; font-size: 14px;">Urgencia <span
                    class="text-danger">*</span></label>
            <select name="urgencia" class="form-control">

                <option value="">Seleccione...</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo Servicio <span
                    class="text-danger">*</span></label>
            <select name="tipo" class="form-control">

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
        <div class="mb-3">
            <label for="horario" class="label text-success" style="font-weight: bold; font-size: 14px;">Horario
                <span class="text-danger">*</span></label>
            <select name="horario" class="form-control">
                <option value="">Seleccione...</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['horarios']->value, 'horario');
$_smarty_tpl->tpl_vars['horario']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['horario']->value) {
$_smarty_tpl->tpl_vars['horario']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['horario']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['horario']->value['rango_hora'];?>
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
