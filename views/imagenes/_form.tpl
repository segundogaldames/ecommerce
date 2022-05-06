<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="imagen" class="control-label">Imagen <span class="text-danger">*</span></label>
        <input type="file" name="imagen" class="form-control" id="" aria-describedby=""
            placeholder="Imagen de la categoría">
    </div>

    <input type="hidden" name="enviar" value="{$enviar}">
    <button type="submit" class="btn btn-outline-success">{$button}</button>
    <a href="{$_layoutParams.root}productos" class="btn btn-outline-primary">Cancelar</a>
</form>