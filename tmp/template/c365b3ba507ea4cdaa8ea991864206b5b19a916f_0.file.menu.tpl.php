<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-16 15:38:43
  from '/var/www/html/veterinaria/views/layout/default/menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_625b1b43b68589_70790236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c365b3ba507ea4cdaa8ea991864206b5b19a916f' => 
    array (
      0 => '/var/www/html/veterinaria/views/layout/default/menu.tpl',
      1 => 1648581816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_625b1b43b68589_70790236 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
"><span
				class="flaticon-pawprint-1 mr-2"></span>Veterinaria</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
			aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span> Menu
		</button>
		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<?php if (((Session::get('autenticado') !== null ))) {?>
					<li class="nav-item active"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
funcionarios/miPerfil"
							class="nav-link"><?php echo Session::get('usuario_nombre');?>
</a></li>
				<?php }?>
				<li class="nav-item"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
videos" class="nav-link">Videos</a></li>

				<?php if (((Session::get('autenticado') !== null ))) {?>

					<?php if (Helper::getRolAdminSuper()) {?>
						<li class="nav-item"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/" class="nav-link">Administración</a></li>
					<?php }?>

				<?php }?>

				<?php if (!((Session::get('autenticado') !== null ))) {?>
					<li class="nav-item"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/login" class="nav-link">Login</a></li>
				<?php } else { ?>
					<li class="nav-item"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/logout" class="nav-link">Logout</a></li>
				<?php }?>
			</ul>
		</div>
	</div>
</nav><?php }
}
