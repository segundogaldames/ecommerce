<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-27 08:36:53
  from '/var/www/html/ecommerce/views/layout/default/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_626938e5e5e588_62124737',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e168afec9a3739d0ff58371b347927c960b9ed7c' => 
    array (
      0 => '/var/www/html/ecommerce/views/layout/default/header.tpl',
      1 => 1651062997,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626938e5e5e588_62124737 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Tienda Virtual</a>
	<!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
		aria-label="Hide Sidebar"></a>
	<!-- Navbar Right Menu-->
	<ul class="app-nav">

		<!-- User Menu-->
		<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
					class="fa fa-user fa-lg"></i></a>
			<ul class="dropdown-menu settings-menu dropdown-menu-right">
				<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
				<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
				<li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
			</ul>
		</li>
	</ul>
</header><?php }
}
