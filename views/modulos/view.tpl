{include file="header.tpl"}
{include file="menu.tpl"}
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="icon fa fa fa-bars" aria-hidden="true"></i> {$titulo}
            </h1>
            <p>{$tema}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{$_layoutParams.root}modulos">Módulos</a></li>
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
                        <th>Módulo:</th>
                        <td>{$modulo.titulo}</td>
                    </tr>
                    <tr>
                        <th>Descripción:</th>
                        <td>{$modulo.descripcion}</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>
                            {if $modulo.status == 1}
                                Activo
                            {else}
                                Inactivo
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{$modulo.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td>{$modulo.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                </table>
                <p>
                    <a href="{$_layoutParams.root}modulos/" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
            </div>
        </div>
    </div>
</main>