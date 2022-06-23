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
								<li><a href="<?= site_url('product/createProductForm') ?>"><i class="fa fa-plus"></i> Créer un article</a></li>
								<li><a href="<?= site_url('product/list') ?>"><i class="fa fa-list"></i> Liste des articles</a></li>
								<li><a href="<?= site_url('admin/listRecharge') ?>"><i class="fa fa-money"></i> Recharges</a></li>
								<li><a href="<?= site_url('recipe/createRecipeForm') ?>"><i class="fa fa-plus"></i> Créer une recette</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
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