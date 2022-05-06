<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="icon fa fa-user-plus" aria-hidden="true"></i> {$titulo}
                <a href="{$_layoutParams.root}permisos/add/{$rol.id}" class="btn btn-outline-dark"><i class="fa fa-plus-square"
                        aria-hidden="true"></i>Crear Permiso</a>
            </h1>
            <p>{$tema}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{$_layoutParams.root}modulos">Módulos</a></li>
            <li class="breadcrumb-item"><a href="{$_layoutParams.root}roles">Roles</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3>
                    {$title} {{$rol.nombre}}
                </h3>

                {include file="../partials/_mensajes.tpl"}

                {if isset($permisos) && count($permisos)}
                    <table id="table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Módulo</th>
                                <th>Leer</th>
                                <th>Crear</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$permisos item=permiso}
                                <tr>
                                    <td>{$permiso.id}</td>
                                    <td>{$permiso.modulo.titulo}</td>
                                    <td>
                                        {if $permiso.leer == 1}
                                            <span class="badge badge-success">Si</span>
                                        {else}
                                            <span class="badge badge-danger">No</span>
                                        {/if}
                                    </td>
                                    <td>
                                        {if $permiso.escribir == 1}
                                            <span class="badge badge-success">Si</span>
                                        {else}
                                            <span class="badge badge-danger">No</span>
                                        {/if}
                                    </td>
                                    <td>
                                        {if $permiso.actualizar == 1}
                                            <span class="badge badge-success">Si</span>
                                        {else}
                                            <span class="badge badge-danger">No</span>
                                        {/if}
                                    </td>
                                    <td>
                                        {if $permiso.eliminar == 1}
                                            <span class="badge badge-success">Si</span>
                                        {else}
                                            <span class="badge badge-danger">No</span>
                                        {/if}
                                    </td>
                                    <td>
                                        <a href="{$_layoutParams.root}permisos/view/{$permiso.id}" class="btn" title="Ver Permiso"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{$_layoutParams.root}permisos/edit/{$permiso.id}" class="btn"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true" title="Editar Permiso"></i></a>
                                    </td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                {else}
                    <p class="text-info">No hay permisos registrados</p>
                {/if}
            </div>
        </div>
    </div>
</main>