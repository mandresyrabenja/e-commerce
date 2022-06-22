<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-Shopper</title>
    <link href="<?= css_url('bootstrap.min') ?>" rel="stylesheet">
    <link href="<?= css_url('font-awesome.min') ?>" rel="stylesheet">
    <link href="<?= css_url('prettyPhoto') ?>" rel="stylesheet">
    <link href="<?= css_url('price-range') ?>" rel="stylesheet">
    <link href="<?= css_url('animate') ?>" rel="stylesheet">
	<link href="<?= css_url('main') ?>" rel="stylesheet">
	<link href="<?= css_url('responsive') ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?= js_url('html5shiv') ?>"></script>
    <script src="<?= js_url('respond.min') ?>"></script>
    <![endif]-->       
    <link rel="shortcut icon" <?= img_url('ico/favicon.ico') ?>>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= img_url('ico/apple-touch-icon-144-precomposed.png') ?>" >
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= img_url('ico/apple-touch-icon-114-precomposed.png') ?>" >
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= img_url('ico/apple-touch-icon-72-precomposed.png') ?>" >
    <link rel="apple-touch-icon-precomposed" href="<?= img_url('ico/apple-touch-icon-57-precomposed.png') ?>" >
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?= base_url() ?>"><img src="<?= img_url('home/logo.png') ?>" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Compte</a></li>
								<li><a href="<?= site_url('cart/cart') ?>"><i class="fa fa-shopping-cart"></i> Panier</a></li>
								<?php if(!isset($_SESSION['customerId'])) : ?>
									<li><a href="<?= site_url('customer/loginForm') ?>"><i class="fa fa-lock"></i> Se connecter</a></li>
								<?php else : ?>
									<li><a href="<?= site_url('customer/logout') ?>"><i class="fa fa-unlock"></i> Deconnexion</a></li>
								<?php endif ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12 pull-right">
						
						<form action="<?= site_url('product/advancedSearch') ?>" method="POST" class="form-inline" role="form">
							<div class="form-group">
								<label for="brand">Catégorie</label>
								<select name="brand" id="brand">
									<option></option>
								<?php 
									if(isset($brands) && !empty($brands)) :
										foreach($brands as $brand) : 
								?>
									<option value="<?= $brand->name ?>"><?= $brand->name ?></option>
								<?php
										endforeach;
									endif;
								?>
								</select>
							</div>
							<div class="form-group">
								<label for="minPrice">Prix min</label>
								<input type="number" class="form-control" name="minPrice">
							</div>
							<div class="form-group">
								<label for="maxPrice">Prix max</label>
								<input type="number" class="form-control" name="maxPrice">
							</div>
							<div class="form-group">
								<label for="keyword">Mots-clés</label>
								<input type="text" class="form-control" name="keyword" placeholder="Rechercher">
							</div>
							
						
							<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<div class="container">
		<?php if(isset($page)) echo $page; ?>
	</div>
	
	<footer id="footer"><!--Footer-->
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="text-center">Copyright © 2022</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="<?= js_url('jquery') ?>"></script>
	<script src="<?= js_url('bootstrap.min') ?>"></script>
	<script src="<?= js_url('jquery.scrollUp.min') ?>"></script>
	<script src="<?= js_url('price-range') ?>"></script>
    <script src="<?= js_url('jquery.prettyPhoto') ?>"></script>
    <script src="<?= js_url('main') ?>"></script>
</body>
</html>