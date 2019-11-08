<header class="main-header">
<!--	<a href="#" class="logo"><b>--><?php //echo $site_name; ?><!--</b></a>-->
    <a href="#" class="logo">
        <span class="hidden-xs">
            <img style="width: 70%" src="/assets/img/logo-yarsi.jpg">
        </span>
    </a>
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
<!--        <div class="navbar-static-top text-center">-->
<!--            <img height="50px" src="/assets/img/header.png"-->
<!--        </div>-->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="hidden-xs"><?php echo $user ? $user->first_name : $_SESSION['username']; ?></span>
					</a>
					<!--<ul class="dropdown-menu">
						<li class="user-footer">
							<div class="pull-right">
								<a href="panel/logout" class="btn btn-danger btn-flat">Sign out</a>
							</div>
						</li>
					</ul>-->
				</li>
			</ul>
		</div>
	</nav>
</header>