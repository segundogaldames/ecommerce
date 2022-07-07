{include file="header.tpl"}
{include file="menu.tpl"}
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="app-menu__icon fa fa-folder-plus"></i> {$titulo}</h1>
            <p>{$tema}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{$_layoutParams.root}categorias">Categorias</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3>
                    {$title}
                </h3>

                {include file="../partials/_mensajes.tpl"}

                <p class="text-danger">Campos obligatorios</p>
                <form action="{$_layoutParams.root}{$ruta}" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="imagen" class="control-label">Imagen <span class="text-danger">*</span></label>
                        <input type="file" name="imagen" class="form-control" id="" aria-describedby=""
                            placeholder="Imagen de la categoría">
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="enviar" value="{$enviar}">
                    <button type="submit" class="btn btn-outline-success">Cambiar</button>
                    <a href="{$_layoutParams.root}categorias" class="btn btn-outline-primary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</main>