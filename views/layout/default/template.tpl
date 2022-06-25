<!DOCTYPE html>
<html>
   <head>
   	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Tienda virtual">

    <title>{$titulo|default:"Tienda Virtual"}</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <!-- Favicons
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="{$_layoutParams.ruta_css}main.css">
    <link rel="stylesheet" type="text/css" href="{$_layoutParams.ruta_css}style.css">

     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">




   </head>
   <body>


      <div class="content">
            <noscript><p>Debe tener el soporte de Javascript habilitado</p></noscript>

            {include file=$_contenido}
          </div>

<!-- Essential javascripts for application to work-->

    <script src="{$_layoutParams.ruta_js}jquery-3.3.1.min.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="{$_layoutParams.ruta_js}popper.min.js"></script>
    <script src="{$_layoutParams.ruta_js}bootstrap.min.js"></script>
    <script src="{$_layoutParams.ruta_js}main.js"></script>
    <script src="{$_layoutParams.ruta_js}fontawesome.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{$_layoutParams.ruta_js}plugins/pace.min.js"></script>
    <script src="{$_layoutParams.ruta_js}funciones.js"></script>
    <script type="text/javascript" language="javascript"
      src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

    {if isset($_layoutParams.js) && count($_layoutParams.js)}
      {foreach item=js from=$_layoutParams.js}
        <script type="text/javascript" src="{$js}"></script>
      {/foreach}

    {/if}
  </body>
</html>