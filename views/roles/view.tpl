<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="icon fa fa-user-plus" aria-hidden="true"></i> Roles</h1>
            <p>Roles de usuarios</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{$_layoutParams.root}roles">Roles</a></li>
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
                        <th>Rol:</th>
                        <td>{$rol.nombre}</td>
                    </tr>
                    <tr>
                        <th>Descripción:</th>
                        <td>{$rol.descripcion}</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>
                            {if $rol.status == 1}
                                Activo
                            {else}
                                Inactivo
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{$rol.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td>{$rol.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                </table>
                <p>
                    <a href="{$_layoutParams.root}roles/edit/{$rol.id}"
                        class="btn btn-outline-primary btn-sm">Editar</a>
                    <a href="{$_layoutParams.root}roles/" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
            </div>
        </div>
    </div>
</main>