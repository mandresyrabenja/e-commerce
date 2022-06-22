<?php  if(isset($product)) : ?>
<div class="row">
	
	<div class="col-sm-12 padding-right">
		<div class="product-details"><!--product-details-->
			<div class="col-sm-5">
				<div class="view-product">
					<img src="<?= img_url('product-details/1.jpg') ?>" alt="" />
				</div>

			</div>
			<div class="col-sm-7">
				<div class="product-information"><!--/product-information-->
					
					<form class="form-inline" action="<?= site_url('cart/addCart') ?>" method="post">
						<h2><?= $product->name ?></h2>
						<p>Réference: <?= $product->id ?></p>
						<span>
							<span><?= $product->price ?>Jeton</span>
							<input type="hidden" name="productId" value="<?= $product->id ?>">
							<label>Quantité:</label>
								<input type="number" name="nb" value="1" min="1" max="<?= $product->nb ?>" />
								<button type="submit" class="btn btn-default cart">
									<i class="fa fa-shopping-cart"></i>
									Ajouter au panier
								</button>
						</span>
						<p><b>Catégorie:</b> <?= $product->brand ?></p>
						<p><b>Nombre disponible:</b> <?= $product->nb ?></p>
					</form>
				</div><!--/product-information-->
			</div>
		</div><!--/product-details-->
		
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<h3>Description</h3>
		<p><?= $product->description ?></p>
	</div>
</div>
<?php
	else :
		echo 'Aucune article selectionné';
	endif;
?>