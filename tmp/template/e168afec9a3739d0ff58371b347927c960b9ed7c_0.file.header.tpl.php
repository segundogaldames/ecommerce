<?php
/* Smarty version 4.0.0-rc.0, created on 2022-05-07 20:17:25
  from '/var/www/html/ecommerce/views/layout/default/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_62770c15d62696_29451606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e168afec9a3739d0ff58371b347927c960b9ed7c' => 
    array (
      0 => '/var/www/html/ecommerce/views/layout/default/header.tpl',
      1 => 1651969035,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62770c15d62696_29451606 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Tienda Virtual</a>
	<!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
		aria-label="Hide Sidebar"></a>
	<!-- Navbar Right Menu-->
	<ul class="app-nav">
		<?php if (Session::get('autenticado')) {?>
			<!-- User Menu-->
			<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
						class="fa fa-user fa-lg"></i></a>
				<ul class="dropdown-menu settings-menu dropdown-menu-right">
					<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-gear" aria-hidden="true"></i> Settings</a></li>
					<li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/perfil"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
					<li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
				</ul>
			</li>
		<?php } else { ?>
			<li>
				<a class="app-nav__item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login/login" aria-label="Open Profile Menu"><i
				class="fa fa-user fa-lg"></i></a>
			</li>
		<?php }?>
	</ul>
</header><?php }
}
