<form action="{$_layoutParams.root}{$ruta}" method="post">
    <div class="form-group">
        <label for="codigo" class="control-label">Código <span class="text-danger">*</span></label>
        <input type="text" name="codigo" value="{$producto.codigo|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Código del producto">
    </div>
    <div class="form-group">
        <label for="nombre" class="control-label">Nombre <span class="text-danger">*</span></label>
        <input type="text" name="nombre" value="{$producto.nombre|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Nombre del producto">
    </div>
    <div class="form-group">
        <label for="descripcion" class="control-label">Descripción<span class="text-danger">*</span></label>
        <textarea name="descripcion" class="form-control" rows="4" placeholder="Descripción del producto"
            style="resize: none;">
            {$producto.descripcion|default:""}
        </textarea>
    </div>
    <div class="form-group">
        <label for="precio" class="control-label">Precio (CLP) <span class="text-danger">*</span></label>
        <input type="text" name="precio" value="{$producto.precio|default:""}" class="form-control" id="" aria-describedby="" placeholder="Precio (CLP) del producto">
    </div>
    <div class="form-group">
        <label for="stock" class="control-label">Stock<span class="text-danger">*</span></label>
        <input type="number" name="stock" value="{$producto.stock|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Stock del producto">
    </div>
    <div class="form-group">
        <label for="status" class="control-label">Status<span class="text-danger">*</span></label>
        <select name="status" class="form-control">
            {if $button == 'Editar'}
                <option value="{$producto.status}">
                    {if $producto.status == 1}
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
    <div class="form-group">
        <label for="categoria" class="control-label">Categoría<span class="text-danger">*</span></label>
        <select name="categoria" class="form-control">
            {if $button == 'Editar'}
                <option value="{$producto.categoria_id}">
                    {$producto.categoria.nombre}
                </option>
            {/if}

            <option value="">Seleccione...</option>
            {foreach from=$categorias item=categoria}
                <option value="{$categoria.id}">{$categoria.nombre}</option>
            {/foreach}

        </select>
    </div>

    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="enviar" value="{$enviar}">
    <button type="submit" class="btn btn-outline-success">{$button}</button>
    <a href="{$_layoutParams.root}productos" class="btn btn-outline-primary">Cancelar</a>
</form>