
	<section>
		<div class="container">
			<div class="row">
				
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Recettes</h2>
						<?php
							if(isset($recipes) && !empty($recipes)) :
								foreach($recipes as $recipe) :
						?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
											<div class="productinfo text-center">
												<a href="<?= site_url("recipe/recipeDetailsClient?id=$recipe->id") ?>">
													<img src="<?= img_url('home/product2.jpg') ?>" alt="photo" />
												</a>
												<p><?= $recipe->name ?></p>
												<a href="<?= site_url("recipe/recipeDetailsClient?id=$recipe->id") ?>" 
													class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ajouter au panier</a>
											</div>
									</div>
								</div>
							</div>
						<?php
								endforeach;
							endif;
						?>
						
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
