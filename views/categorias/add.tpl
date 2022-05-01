<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="app-menu__icon fa fa-folder-plus"></i> {$titulo}</h1>
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

                <p class="text-danger">Campos obligatorios</p>
                {include file="../categorias/_form.tpl"}
            </div>
        </div>
    </div>
</main>