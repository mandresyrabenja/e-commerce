<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="<?= css_url('bootstrap.min') ?>" rel="stylesheet">
    <link href="<?= css_url('font-awesome.min') ?>" rel="stylesheet">
    <link href="<?= css_url('prettyPhoto') ?>" rel="stylesheet">
    <link href="<?= css_url('price-range') ?>" rel="stylesheet">
    <link href="<?= css_url('animate') ?>" rel="stylesheet">
    <link href="<?= css_url('main') ?>" rel="stylesheet">
    <link href="<?= css_url('responsive') ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?= img_url('ico/favicon.ico') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= img_url('ico/apple-touch-icon-144-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= img_url('ico/apple-touch-icon-114-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= img_url('ico/apple-touch-icon-72-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= img_url('ico/apple-touch-icon-57-precomposed.png') ?>">
</head>
<!--/head-->

<body>

    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Se connecter</h2>
                        <?php if(isset($error)) : ?>
                            <div class="text-danger">Login ou mot de passe incorrecte</div>
                        <?php endif ?>
                        <form method="POST" action="<?= site_url('admin/login') ?>">
                            <input type="text" name="login" placeholder="Login" />
                            <input type="password" name="password" placeholder="Mot de passe" />
                            <button type="submit" class="btn btn-default">Se connecter</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>             
                <div class="col-sm-3"></div>
            </div>
            
        </div>
    </section>
    <!--/form-->

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/price-range.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>