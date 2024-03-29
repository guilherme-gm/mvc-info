<?php

use Lib\Session;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title><?= Lib\Config::get('site_name') ?></title>

<!-- Bootstrap -->
<link href="<?= Lib\App::getRouter()->getResourceUrl('static/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= Lib\App::getRouter()->getResourceUrl('static/css/bootstrap-theme.min.css') ?>" rel="stylesheet">
<link href="<?= Lib\App::getRouter()->getResourceUrl('static/css/style.css') ?>" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
	    <div class="navbar-header">
		<a class="navbar-brand" href="<?= Lib\App::getRouter()->getUrl() ?>"><?= Lib\Config::get('site_name') ?></a>
	    </div>
	    <div id="navbar" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
		    <li <?php if (Lib\App::getRouter()->getController() == 'pagina') { ?>class="active"<?php } ?>><a href="<?= Lib\App::getRouter()->getUrl('pagina') ?>">Paginas</a></li>
		    <li <?php if (Lib\App::getRouter()->getController() == 'contato') { ?>class="active"<?php } ?>><a href="<?= Lib\App::getRouter()->getUrl('contato') ?>">Contato</a></li>
		</ul>
	    </div><!--/.nav-collapse -->
	</div>
    </nav>

    <div class="container">

	<div class="starter-template">
	    <?php if (Session::hasFlash()): ?>
    	    <div class="alert alert-info" role="alert">
		    <?php Session::flash(); ?>
    	    </div>
	    <?php endif; ?>
	    
	    <?= $data['content'] ?>
	</div>

    </div><!-- /.container -->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= Lib\App::getRouter()->getResourceUrl('static/js/bootstrap.min.js') ?>"></script>
</body>
</html>

