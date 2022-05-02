<?php
/* Smarty version 4.0.0-rc.0, created on 2022-05-01 19:30:38
  from '/var/www/html/ecommerce/views/index/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_626f181eaba251_71983485',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7572c45d1cd039b99cc5dbba0fb45e98d4b3089' => 
    array (
      0 => '/var/www/html/ecommerce/views/index/index.tpl',
      1 => 1651376789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626f181eaba251_71983485 (Smarty_Internal_Template $_smarty_tpl) {
?><main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboardd</h1>
            <p>Página de inicio del proyecto</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Dashboard</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">Bienvenido <?php echo Session::get('usuario_name');?>
</div>
            </div>
        </div>
    </div>
</main><?php }
}
