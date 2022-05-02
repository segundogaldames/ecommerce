<?php
/* Smarty version 4.0.0-rc.0, created on 2022-05-01 19:30:38
  from '/var/www/html/ecommerce/views/layout/default/menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_626f181e90fd54_53146431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba72d3a34ba307a7d14cd5608d37eac40ac42b4a' => 
    array (
      0 => '/var/www/html/ecommerce/views/layout/default/menu.tpl',
      1 => 1651424665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626f181e90fd54_53146431 (Smarty_Internal_Template $_smarty_tpl) {
if (((Session::get('autenticado') !== null ))) {?>

	<!-- Sidebar menu-->
	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
	<aside class="app-sidebar">
		<div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
avatar2.png"
				alt="User Image" width="50">
			<div>
				<p class="app-sidebar__user-name"><?php echo Helper::getIniciales(Session::get('usuario_name'));?>
</p>
				<p class="app-sidebar__user-designation"><?php echo Session::get('usuario_rol');?>
</p>
			</div>
		</div>
		<ul class="app-menu">
			<li><a class="app-menu__item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
"><i class="app-menu__icon fa fa-dashboard"></i><span
						class="app-menu__label">Dashboard</span></a></li>

			<?php if (Helper::getRolAdminSuper()) {?>
				<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview">
						<i class="app-menu__icon fa fa-users" aria-hidden="true"></i><span
							class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
					<ul class="treeview-menu">
						<li><a class="treeview-item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios">
								<i class="icon fa fa-user" aria-hidden="true"></i>
								Usuarios</a>
						</li>
						<?php if (Helper::getRolAdmin()) {?>
							<li><a class="treeview-item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
roles" rel="noopener"><i
										class="icon fa fa-user-plus" aria-hidden="true"></i> Roles</a>
							</li>
						<?php }?>
					</ul>
				</li>
			<?php }?>
			<?php if (Helper::getRolAdminSuper()) {?>
				<li>
					<a class="app-menu__item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
clientes"><i class="app-menu__icon fa fa-user"
							aria-hidden="true"></i><span class="app-menu__label">Clientes</span></a>
				</li>
			<?php }?>
			<li>
				<a class="app-menu__item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pedidos"><i
						class="app-menu__icon fa fa-cart-arrow-down" aria-hidden="true"></i><span
						class="app-menu__label">Pedidos</span></a>
			</li>
			<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview">
						<i class="app-menu__icon fa fa-product-hunt" aria-hidden="true"></i></i><span
						class="app-menu__label">Productos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
				<ul class="treeview-menu">
					<li><a class="treeview-item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
categorias">
							<i class="app-menu__icon fa fa-folder-plus"></i>
							Categorias</a>
					</li>

					<li><a class="treeview-item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
productos" rel="noopener">
						<i class="app-menu__icon fa fa-product-hunt" aria-hidden="true"></i> Productos</a>
					</li>

				</ul>
			</li>
			<li>
				<a class="app-menu__item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/logout"><i
						class="app-menu__icon fa fa-user-times" aria-hidden="true"></i><span
						class="app-menu__label">Logout</span></a>
			</li>
		</ul>
	</aside>
<?php }
}
}
