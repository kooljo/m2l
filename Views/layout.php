<!DOCTYPE html>
<html>

<head>
	<title>M2L<?php if ($title) {echo " - ".$title;};?></title>
	<meta charset="utf-8">
  	<meta content="IE=edge" http-equiv="X-UA-Compatible">
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"><!-- Bootstrap 3.3.6 -->
	<link href=<?php ROOTDIR ?>"/bootstrap/css/bootstrap.min.css" rel="stylesheet"><!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"><!-- Ionicons -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet"><!-- Theme style -->
	<link href=<?php ROOTDIR ?>"/dist/css/AdminLTE.css" rel="stylesheet">
	<link href=<?php ROOTDIR ?>"/dist/css/skins/skin-blue.min.css" rel="stylesheet">
	<link href=<?php ROOTDIR ?>"/custom/css/main.css" rel="stylesheet">
</head>

<body <?= $classBody;?> >

	<div class="wrapper">

		<!-- Main Header -->
		<header class="main-header">
			<!-- Logo -->
			<a class="logo" href="index2.html"><!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>A</b>LT</span> <!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Admin</b>LTE</span></a> <!-- Header Navbar -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a class="sidebar-toggle" data-toggle="offcanvas" href="#" role="button"><span class="sr-only">Toggle navigation</span></a> <!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<a href=<?php ROOTDIR ?>"/index.php?controller=security&action=logout">Déconnexion</a>
				</div>
			</nav>
		</header><!-- Left side column. contains the logo and sidebar -->

		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel">
					<div class="pull-left image"><img alt="User Image" class="img-circle" src=<?php ROOTDIR ?>"/dist/img/user2-160x160.jpg"></div>
					<div class="pull-left info">
						<p> <?= $this->employee->getUsername(); ?></p><!-- Status -->
						<p><span class="badge bg-maroon"><?= $this->employee->getCreditsLeft(); ?> CF</span> <span class="badge bg-purple"><?= $this->employee->getDaysLeft(); ?> jours</span></p>

					</div>
				</div><!-- search form (Optional) -->
				<!-- Sidebar Menu -->
				<ul class="sidebar-menu">
					<li class="header"></li><!-- Optionally, you can add icons to the links -->
					<li>
						<a href=<?php ROOTDIR ?>"/index.php?controller=home&action=home"><i class="fa fa-link"></i> <span>Page d'accueil</span></a>
					</li>
					<li>
						<a href=<?php ROOTDIR ?>"/index.php?controller=formation&action=index"><i class="fa fa-link"></i> <span>Mes formations</span></a>
					</li>
					<?php if($this->employee->isManager()) { ?>
						<li>
							<a href=<?php ROOTDIR ?>"/index.php?controller=team&action=show"><i class="fa fa-link"></i> <span>Gestion d'équipe</span></a>
						</li>
					<?php } ?>
				</ul><!-- /.sidebar-menu -->
			</section><!-- /.sidebar -->
		</aside>

	    <?= $content ?>

		<script src=<?php ROOTDIR ?>"/plugins/jQuery/jquery-2.2.3.min.js"></script> <!-- Bootstrap 3.3.6 -->
		<script src=<?php ROOTDIR ?>"/bootstrap/js/bootstrap.min.js"></script> <!-- AdminLTE App -->
		<script src=<?php ROOTDIR ?>"/dist/js/app.min.js"></script>
		<script src=<?php ROOTDIR ?>"/custom/js/commun.js"></script>
		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<div class="pull-right hidden-xs">
				<a href="#">Mentions légales</a>
			</div><!-- Default to the left -->
			<strong>Copyright &copy; 2016 <a href="#">M2L</a>.</strong> Tous droits réservés.
		</footer>

	</div><!-- ./wrapper -->
</body>

</html>