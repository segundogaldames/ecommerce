<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-25 11:08:40
  from '/var/www/html/veterinaria/views/telefonos/_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6266b978523c84_93740440',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76a2554a1f0f659c10fd616983e53534620443bc' => 
    array (
      0 => '/var/www/html/veterinaria/views/telefonos/_form.tpl',
      1 => 1640047017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6266b978523c84_93740440 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="" method="post">
    <div class="mb-3">
        <label for="numero" class="label text-success" style="font-weight: bold; font-size: 14px;">Teléfono <span
                class="text-danger">*</span></label>
        <input type="number" name="numero" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['telefono']->value['numero'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id="" aria-describedby=""
            placeholder="Número de teléfono">
    </div>
    <div class="mb-3">
        <label for="movil" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo <span
                class="text-danger">*</span></label>
        <select name="movil" class="form-control">
            <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Editar') {?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['telefono']->value['movil'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['telefono']->value['movil'] == 1) {?>
                        Móvil
                    <?php } else { ?>
                        Fijo
                    <?php }?>
                </option>
            <?php }?>

            <option value="">Seleccione...</option>
            <option value="1">Móvil</option>
            <option value="2">Fijo</option>
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
