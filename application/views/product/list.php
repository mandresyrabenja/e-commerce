
	<section>
		<div class="container">
			<div class="row">
				
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Articles</h2>
						<?php
							if(isset($products) && !empty($products)) :
								foreach($products as $product) :
						?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
											<div class="productinfo text-center">
												<img src="<?= img_url('home/product2.jpg') ?>" alt="photo" />
												<h2><?= $product->price ?>Ar</h2>
												<p><?= $product->name ?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ajouter au panier</a>
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
