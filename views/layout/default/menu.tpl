<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
	<div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
			src="{$_layoutParams.ruta_img}avatar.png" alt="User Image" width="50">
		<div>
			<p class="app-sidebar__user-name">Usuario</p>
			<p class="app-sidebar__user-designation">Rol</p>
		</div>
	</div>
	<ul class="app-menu">
		<li><a class="app-menu__item" href="{$_layoutParams.root}"><i class="app-menu__icon fa fa-dashboard"></i><span
					class="app-menu__label">Dashboard</span></a></li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview">
			<i class="app-menu__icon fa fa-users" aria-hidden="true"></i><span class="app-menu__label">Usuarios</span><i
					class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="{$_layoutParams.root}usuarios">
					<i class="icon fa fa-user" aria-hidden="true"></i>
						Usuarios</a>
					</li>
				<li><a class="treeview-item" href="{$_layoutParams.root}roles" rel="noopener"><i class="icon fa fa-user-plus" 	aria-hidden="true"></i> Roles</a>
				</li>
			</ul>
		</li>
		<li>
			<a class="app-menu__item" href="{$_layoutParams.root}clientes"><i class="app-menu__icon fa fa-user" aria-hidden="true"></i><span
					class="app-menu__label">Clientes</span></a>
		</li>
		<li>
			<a class="app-menu__item" href="{$_layoutParams.root}pedidos"><i class="app-menu__icon fa fa-cart-arrow-down" aria-hidden="true"></i><span class="app-menu__label">Pedidos</span></a>
		</li>
		<li>
			<a class="app-menu__item" href="{$_layoutParams.root}productos"><i class="app-menu__icon fa fa-product-hunt" aria-hidden="true"></i><span class="app-menu__label">Productos</span></a>
		</li>
		<li>
			<a class="app-menu__item" href="{$_layoutParams.root}usuarios/logout"><i class="app-menu__icon fa fa-user-times" aria-hidden="true"></i><span class="app-menu__label">Logout</span></a>
		</li>
	</ul>
</aside>