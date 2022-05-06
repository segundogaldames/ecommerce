<form action="" method="post">
    {if $button == 'Guardar'}
        <div class="form-group">
            <label for="nombre" class="control-label">Módulos <span class="text-danger">*</span></label>
            <select name="modulo" class="form-control">
                <option value="">Seleccione...</option>
                {foreach from=$modulos item=modulo}
                    <option value="{{$modulo.id}}">{{$modulo.titulo}}</option>
                {/foreach}
            </select>
        </div>
    {/if}
    <div class="form-group">
        <label for="leer" class="control-label">Lectura<span class="text-danger">*</span></label>
        <select name="leer" class="form-control">
            {if $button == 'Editar'}
                <option value="{$permiso.leer}">
                    {if $permiso.leer == 1}
                        Si
                    <option value="2">Desactivar</option>
                {else}
                    No
                    <option value="1">Activar</option>
                {/if}
                </option>
            {else}
                <option value="">Seleccione...</option>
                <option value="1">Activar</option>
                <option value="2">Desactivar</option>
            {/if}
        </select>
    </div>
    <div class="form-group">
        <label for="escribir" class="control-label">Escritura<span class="text-danger">*</span></label>
        <select name="escribir" class="form-control">
            {if $button == 'Editar'}
                <option value="{$permiso.escribir}">
                    {if $permiso.escribir == 1}
                        Si
                    <option value="2">Desactivar</option>
                {else}
                    No
                    <option value="1">Activar</option>
                {/if}
                </option>
            {else}
                <option value="">Seleccione...</option>
                <option value="1">Activar</option>
                <option value="2">Desactivar</option>
            {/if}
        </select>
    </div>
    <div class="form-group">
        <label for="actualizar" class="control-label">Actualización<span class="text-danger">*</span></label>
        <select name="actualizar" class="form-control">
            {if $button == 'Editar'}
                <option value="{$permiso.actualizar}">
                    {if $permiso.actualizar == 1}
                        Si
                    <option value="2">Desactivar</option>
                {else}
                    No
                    <option value="1">Activar</option>
                {/if}
                </option>
            {else}
                <option value="">Seleccione...</option>
                <option value="1">Activar</option>
                <option value="2">Desactivar</option>
            {/if}
        </select>
    </div>
    <div class="form-group">
        <label for="eliminar" class="control-label">Eliminación<span class="text-danger">*</span></label>
        <select name="eliminar" class="form-control">
            {if $button == 'Editar'}
                <option value="{$permiso.eliminar}">
                    {if $permiso.leer == 1}
                        Si
                    <option value="2">Desactivar</option>
                {else}
                    No
                    <option value="1">Activar</option>
                {/if}
                </option>
            {else}
                <option value="">Seleccione...</option>
                <option value="1">Activar</option>
                <option value="2">Desactivar</option>
            {/if}
        </select>
    </div>
    <input type="hidden" name="enviar" value="{$enviar}">
    <button type="submit" class="btn btn-outline-success">{$button}</button>
    <a href="{$_layoutParams.root}{$ruta}" class="btn btn-outline-primary">Cancelar</a>
</form>