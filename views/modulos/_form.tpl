<form action="{$_layoutParams.root}{$ruta}" method="post">
    <div class="form-group">
        <label for="nombre" class="control-label">Nombre <span class="text-danger">*</span></label>
        <input type="text" name="titulo" value="{$modulo.titulo|default:""}" class="form-control" id="" aria-describedby=""
            placeholder="Nombre del módulo">
    </div>
    <div class="form-group">
        <label for="descripcion" class="control-label">Descripción<span class="text-danger">*</span></label>
        <textarea name="descripcion" class="form-control" rows="4" placeholder="Descripción del módulo"
            style="resize: none;">
            {$modulo.descripcion|default:""}
        </textarea>
    </div>
    <div class="form-group">
        <label for="status" class="control-label">Status<span class="text-danger">*</span></label>
        <select name="status" class="form-control">
            {if $button == 'Editar'}
                <option value="{$modulo.status}">
                    {if $modulo.status == 1}
                        Activo
                    <option value="2">Desactivar</option>
                {else}
                    Inactivo
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
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="enviar" value="{$enviar}">
    <button type="submit" class="btn btn-outline-success">{$button}</button>
    <a href="{$_layoutParams.root}modulos" class="btn btn-outline-primary">Cancelar</a>
</form>