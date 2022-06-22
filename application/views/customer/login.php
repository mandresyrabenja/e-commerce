
    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Connectez-vous à votre compte</h2>
                        <?php if(isset($error)) : ?>
                            <div class="text-danger">Login ou mot de passe incorrecte</div>
                        <?php endif ?>
						<form action="<?= site_url('customer/login') ?>" method="POST">
							<input type="email" name="email" placeholder="Email" required />
							<input type="password" name="password"  placeholder="Mot de passe" required />
							<button type="submit" class="btn btn-default">Se connecter</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OU</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Inscrivez-vous!</h2>
						<form action="<?= site_url('customer/register') ?>" method="POST">
							<input type="text" name="name" placeholder="Nom" required/>
							<input type="email" name="email" placeholder="Email" required/>
							<input type="password" name="password" placeholder="Mot de passe" required/>
							<button type="submit" class="btn btn-default">S'inscrire</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
            
        </div>
    </section>
