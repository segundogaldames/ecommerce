{include file="header.tpl"}
{include file="menu.tpl"}
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="app-menu__icon fa fa-product-hunt" aria-hidden="true"></i> {$titulo}
                <a href="{$_layoutParams.root}productos/add" class="btn btn-outline-dark"><i class="fa fa-plus-square"
                    aria-hidden="true"></i>Crear Producto</a>
            </h1>
            <p>{$tema}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{$_layoutParams.root}categorias">Categorias</a></li>
            <li class="breadcrumb-item"><a href="{$_layoutParams.root}productos">Productos</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
            <h3>
                {$title}
            </h3>
                {include file="../partials/_mensajes.tpl"}

                {if isset($productos) && count($productos)}
                    <table id="table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Status</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$productos item=producto}
                                <tr>
                                    <td>{$producto.id}</td>
                                    <td>{$producto.codigo}</td>
                                    <td>{$producto.nombre}</td>
                                    <td>{$producto.categoria.nombre}</td>
                                    <td>$ {$producto.precio|number_format:0:",":"."}</td>
                                    <td>
                                        {if $producto.status == 1}
                                            <span class="badge badge-success">Activo</span>
                                        {else}
                                            <span class="badge badge-danger">Inactivo</span>
                                        {/if}
                                    </td>
                                    <td>
                                        <a href="{$_layoutParams.root}productos/view/{$producto.id}" class="btn"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{$_layoutParams.root}productos/edit/{$producto.id}" class="btn"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                {else}
                    <p class="text-info">No hay productos registrados</p>
                {/if}
            </div>
        </div>
    </div>
</main>