<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="app-menu__icon fa fa-folder-plus"></i> {$titulo}
                <a href="{$_layoutParams.root}categorias/add" class="btn btn-outline-dark"><i class="fa fa-plus-square"
                    aria-hidden="true"></i>Crear Categoría</a>
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

                {if isset($categorias) && count($categorias)}
                    <table id="table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Status</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$categorias item=categoria}
                                <tr>
                                    <td>{$categoria.id}</td>
                                    <td>{$categoria.nombre}</td>
                                    <td>{$categoria.descripcion}</td>
                                    <td>
                                        {if $categoria.status == 1}
                                            <span class="badge badge-success">Activo</span>
                                        {else}
                                            <span class="badge badge-danger">Inactivo</span>
                                        {/if}
                                    </td>
                                    <td>
                                        <a href="{$_layoutParams.root}categorias/view/{$categoria.id}" class="btn"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                        <a href="{$_layoutParams.root}categorias/edit/{$categoria.id}" class="btn"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                {else}
                    <p class="text-info">No hay categorias registradas</p>
                {/if}
            </div>
        </div>
    </div>
</main>