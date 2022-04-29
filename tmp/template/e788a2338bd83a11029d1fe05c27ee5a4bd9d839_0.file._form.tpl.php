<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-28 19:43:13
  from '/var/www/html/ecommerce/views/roles/_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_626b26917b90a6_70836029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e788a2338bd83a11029d1fe05c27ee5a4bd9d839' => 
    array (
      0 => '/var/www/html/ecommerce/views/roles/_form.tpl',
      1 => 1651189390,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626b26917b90a6_70836029 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="" method="post">
    <div class="form-group">
        <label for="nombre" class="control-label">Nombre <span
                class="text-danger">*</span></label>
        <input type="text" name="nombre" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['rol']->value['nombre'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id=""
            aria-describedby="" placeholder="Nombre del rol">
    </div>
    <div class="form-group">
        <label for="descripcion" class="control-label">Descripción<span class="text-danger">*</span></label>
        <textarea name="descripcion" class="form-control" rows="4" placeholder="Descripción del rol" style="resize: none;">
            <?php echo (($tmp = $_smarty_tpl->tpl_vars['rol']->value['descripcion'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>

        </textarea>
    </div>
    <div class="form-group">
        <label for="status" class="control-label">Status<span class="text-danger">*</span></label>
        <select name="status" class="form-control">
            <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Editar') {?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['rol']->value['status'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['rol']->value['status'] == 1) {?>
                        Activo
                        <option value="2">Desactivar</option>
                    <?php } else { ?>
                        Inactivo
                        <option value="1">Activar</option>
                    <?php }?>
                </option>
            <?php } else { ?>
                <option value="">Seleccione...</option>
                <option value="1">Activar</option>
                <option value="2">Desactivar</option>
            <?php }?>
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
