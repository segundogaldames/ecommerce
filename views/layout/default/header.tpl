<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{$_layoutParams.root}">Tienda Virtual</a>
	<!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
		aria-label="Hide Sidebar"></a>
	<!-- Navbar Right Menu-->
	<ul class="app-nav">
		{if Session::get('autenticado')}
			<!-- User Menu-->
			<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
						class="fa fa-user fa-lg"></i></a>
				<ul class="dropdown-menu settings-menu dropdown-menu-right">
<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-gear" aria-hidden="true"></i> Settings</a></li>
					<li><a class="dropdown-item" href="{$_layoutParams.root}usuarios/perfil"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
					<li><a class="dropdown-item" href="{$_layoutParams.root}login/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
				</ul>
			</li>
		{else}
			<li>
				<a class="app-nav__item" href="{$_layoutParams.root}login/login" aria-label="Open Profile Menu"><i
				class="fa fa-user fa-lg"></i></a>
			</li>
		{/if}
	</ul>
</header>