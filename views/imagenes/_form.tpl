<form action="" method="post" enctype="multipart/form-data">
    {if $button == 'Editar'}
        <div class="form-group">
            <label for="portada" class="control-label">Portada <span class="text-danger">*</span></label>
            <select name="portada" class="form-control">
                {if $imagen.portada == 1}
                    <option value="{$imagen.portada}">Portada</option>
                    <option value="2">Desactivar</option>
                {else}
                    <option value="{$imagen.portada}">No Portada</option>
                    <option value="1">Activar</option>
                {/if}
            </select>
        </div>
    {else}
        <div class="form-group">
            <label for="imagen" class="control-label">Imagen <span class="text-danger">*</span></label>
            <input type="file" name="imagen" class="form-control" id="" aria-describedby=""
                placeholder="Imagen de la categoría">
        </div>
    {/if}

    <input type="hidden" name="enviar" value="{$enviar}">
    <button type="submit" class="btn btn-outline-success">{$button}</button>
    <a href="{$_layoutParams.root}productos" class="btn btn-outline-primary">Cancelar</a>
</form>