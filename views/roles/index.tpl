{include file="header.tpl"}
{include file="menu.tpl"}
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="icon fa fa-user-plus" aria-hidden="true"></i> {$titulo}
                <a href="{$_layoutParams.root}roles/add" class="btn btn-outline-dark"><i class="fa fa-plus-square" aria-hidden="true"></i>Crear Rol</a>
            </h1>
            <p>{$tema}</p>
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

                {if isset($roles) && count($roles)}
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
                            {foreach from=$roles item=rol}
                                <tr>
                                    <td>{$rol.id}</td>
                                    <td>{$rol.nombre}</td>
                                    <td>{$rol.descripcion}</td>
                                    <td>
                                        {if $rol.status == 1}
                                            <span class="badge badge-success">Activo</span>
                                        {else}
                                            <span class="badge badge-danger">Inactivo</span>
                                        {/if}
                                    </td>
                                    <td>
                                        <a href="{$_layoutParams.root}roles/view/{$rol.id}" class="btn" title="Ver Rol"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{$_layoutParams.root}roles/edit/{$rol.id}"
                                            class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar Rol"></i></a>
                                        <a href="{$_layoutParams.root}permisos/permisosRol/{$rol.id}" class="btn" title="Ver Permisos"><i
                                            class="fa fa-key" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                {else}
                    <p class="text-info">No hay roles registrados</p>
                {/if}
            </div>
        </div>
    </div>
</main>