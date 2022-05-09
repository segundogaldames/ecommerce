{include file="header.tpl"}
{include file="menu.tpl"}
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="icon fa fa-user-plus" aria-hidden="true"></i> {$titulo}
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
                    {$title}
                </h3>

                {include file="../partials/_mensajes.tpl"}

                <table class="table table-hover">
                    <tr>
                        <th>Rol:</th>
                        <td>{$permiso.rol.nombre}</td>
                    </tr>
                    <tr>
                        <th>Módulo:</th>
                        <td>{$permiso.modulo.titulo}</td>
                    </tr>
                    <tr>
                        <th>Lectura:</th>
                        <td>
                            {if $permiso.leer == 1}
                                Si
                            {else}
                                No
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <th>Escritura:</th>
                        <td>
                            {if $permiso.escribir == 1}
                                Si
                            {else}
                                No
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <th>Actualización:</th>
                        <td>
                            {if $permiso.actualizar == 1}
                                Si
                            {else}
                                No
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <th>Eliminación:</th>
                        <td>
                            {if $permiso.eliminar == 1}
                                Si
                            {else}
                                No
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{$permiso.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                    <tr>
                        <th>Actualizado:</th>
                        <td>{$permiso.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                </table>
                <p>
                    <a href="{$_layoutParams.root}permisos/permisosRol/{$permiso.rol_id}" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
            </div>
        </div>
    </div>
</main>