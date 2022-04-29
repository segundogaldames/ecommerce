<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-29 12:54:08
  from '/var/www/html/ecommerce/views/usuarios/_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_626c18301c8117_47698766',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61741d19145c38987e95c5301efb3c611ee6ed46' => 
    array (
      0 => '/var/www/html/ecommerce/views/usuarios/_form.tpl',
      1 => 1651251043,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626c18301c8117_47698766 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="" method="post">
    <div class="form-group">
        <label for="rut" class="control-label">RUT<span class="text-danger">*</span></label>
        <input type="text" name="rut" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usuario']->value['rut'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id="" aria-describedby=""
            placeholder="RUT del usuario">
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Nombre<span
                class="text-danger">*</span></label>
        <input type="text" name="name" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usuario']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id="" aria-describedby=""
            placeholder="Nombre del usuario">
    </div>
    <div class="form-group">
        <label for="lastname" class="control-label">Apellido(s)<span class="text-danger">*</span></label>
        <input type="text" name="lastname" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usuario']->value['lastname'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id="" aria-describedby=""
            placeholder="Apellido(s) del usuario">
    </div>
    <div class="form-group">
        <label for="email" class="control-label">Email<span class="text-danger">*</span></label>
        <input type="email" name="email" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usuario']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id="" aria-describedby=""
            placeholder="Email del usuario">
    </div>
    <div class="form-group">
        <label for="phone" class="control-label">Teléfono<span class="text-danger">*</span></label>
        <input type="text" name="phone" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usuario']->value['phone'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id="" aria-describedby=""
            placeholder="Teléfono del usuario">
    </div>
    <div class="form-group">
        <label for="rol" class="control-label">Rol<span class="text-danger">*</span></label>
        <select name="rol" class="form-control">
            <option value="">Seleccione...</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'rol');
$_smarty_tpl->tpl_vars['rol']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rol']->value) {
$_smarty_tpl->tpl_vars['rol']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['rol']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['rol']->value['nombre'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Guardar' || $_smarty_tpl->tpl_vars['button']->value == 'Modificar') {?>
        <div class="form-group">
            <label for="clave" class="control-label">Password<span
                    class="text-danger">*</span></label>
            <input type="password" name="clave" class="form-control" id="" aria-describedby=""
                placeholder="Password del usuario" onpaste="return false">
        </div>
        <div class="form-group">
            <label for="reclave" class="control-label">Confirmar Password<span class="text-danger">*</span></label>
            <input type="password" name="reclave" class="form-control" id="" aria-describedby=""
    placeholder="Confirmar password del usuario" onpaste="return false">
        </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Editar') {?>
        <div class="form-group">
            <label for="status" class="control-label">Status<span class="text-danger">*</span></label>
            <select name="activo" class="form-control">
                <option value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['status'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['usuario']->value['status'] == 1) {?>
                        Activo
                        <option value="2">Desactivar</option>
                    <?php } else { ?>
                        Inactivo
                        <option value="1">Activar</option>
                    <?php }?>
                </option>
            </select>
        </div>
    <?php }?>
    <input type="hidden" name="enviar" value="<?php echo $_smarty_tpl->tpl_vars['enviar']->value;?>
">
    <button type="submit" class="btn btn-outline-success"><?php echo $_smarty_tpl->tpl_vars['button']->value;?>
</button>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];
echo $_smarty_tpl->tpl_vars['ruta']->value;?>
" class="btn btn-outline-primary">Cancelar</a>
</form><?php }
}
