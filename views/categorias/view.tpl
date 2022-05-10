{include file="header.tpl"}
{include file="menu.tpl"}
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="app-menu__icon fa fa-folder-plus"></i> {$titulo}
            </h1>
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

                <table class="table table-hover">
                    <tr>
                        <th>Categoría:</th>
                        <td>{$categoria.nombre}</td>
                    </tr>
                    <tr>
                        <th>Descripción:</th>
                        <td>{$categoria.descripcion}</td>
                    </tr>
                    <tr>
                        <th>Portada:</th>
                        <td>
                            <img src="{$_layoutParams.root}public/img/categorias/{$categoria.portada}" alt=""
                                class="img-thumbnail">
                            <a href="{$_layoutParams.root}categorias/newImagen/{$categoria.id}" class="btn btn-outline-dark">Cambiar Imagen</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>
                            {if $categoria.status == 1}
                                Activo
                            {else}
                                Inactivo
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{$categoria.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td>{$categoria.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                </table>
                <p>
                    <a href="{$_layoutParams.root}categorias/" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
            </div>
        </div>
    </div>
</main>