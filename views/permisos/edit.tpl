<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="icon fa fa fa-bars" aria-hidden="true"></i> {$titulo}</h1>
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
                <h4>Rol: {$permiso.rol.nombre}</h4>
                <h4>Módulo: {$permiso.modulo.titulo}</h4>
                <p class="text-danger">Campos obligatorios</p>
                {include file="../permisos/_form.tpl"}

            </div>
        </div>
    </div>
</main>