<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="app-menu__icon fa fa-product-hunt" aria-hidden="true"></i> {$titulo}</h1>
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
            <h3>{$title}</h3>

                {include file="../partials/_mensajes.tpl"}

                <table class="table table-hover">
                    <tr>
                        <th>Código:</th>
                        <td>{$producto.codigo}</td>
                    </tr>
                    <tr>
                        <th>Nombre:</th>
                        <td>{$producto.nombre}</td>
                    </tr>
                    <tr>
                        <th>Descripción:</th>
                        <td>{$producto.descripcion}</td>
                    </tr>
                    <tr>
                        <th>Precio:</th>
                        <td>$ {$producto.precio|number_format:0:",":"."}</td>
                    </tr>
                    <tr>
                        <th>Stock:</th>
                        <td>{$producto.stock}</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>
                            {if $producto.status == 1}
                                Activo
                            {else}
                                Inactivo
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <th>Categoría:</th>
                        <td>{$producto.categoria.nombre}</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{$producto.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td>{$producto.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                </table>
                <p>
                    <a href="{$_layoutParams.root}productos/" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
            </div>
            <div class="tile">
                <h3>Imágenes</h3>
                {include file="../partials/_mensajes.tpl"}


            </div>
        </div>
    </div>
</main>