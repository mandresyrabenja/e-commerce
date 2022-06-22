
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
			<div class="row">
				<div class="col-sm-12">
					<ul class="pagination">
						<?php if( ($prevPage > 0) && ($nbPage != 1)) : ?>
							<li>
								<a href="<?= site_url("product/getProductPageClient?pageSize=6&currPage=$prevPage") ?>" class="btn btn-warning">
									<i class="fa fa-arrow-left"></i>
								</a>
							</li>
						<?php endif ?>
						<?php 
							if(isset($nbPage) && $nbPage > 0) :
								for($i = 1; $i <= $nbPage; $i++) :
						?>
							<li <?php if($i == $currPage) : ?> class="active" <?php endif ?> >
								<a href="<?= site_url("product/getProductPageClient?pageSize=6&currPage=$i") ?>"><?= $i ?></a>
							</li>
						<?php 
								endfor;
							endif; 
						?>
						<?php if(($nextPage < $nbPage) && ($nbPage != 1)) : ?>
							<li>
								<a href="<?= site_url("product/getProductPageClient?pageSize=6&currPage=$nextPage") ?>" class="btn btn-warning">
									<i class="fa fa-arrow-right"></i>
								</a>
							</li>
						<?php endif ?>
					</ul> 
				</div>
			</div>
		</div>
	</section>
