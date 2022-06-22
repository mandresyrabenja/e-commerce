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
					<img src="images/product-details/new.jpg" class="newarrival" alt="" />
					<h2><?= $product->name ?></h2>
					<p>Réference: <?= $product->id ?></p>
					<img src="images/product-details/rating.png" alt="" />
					<span>
						<span><?= $product->price ?>Jeton</span>
						<label>Quantity:</label>
						<input type="text" value="3" />
						<button type="button" class="btn btn-fefault cart">
							<i class="fa fa-shopping-cart"></i>
							Ajouter au panier
						</button>
					</span>
					<p><b>Catégorie:</b> <?= $product->brand ?></p>
					<p><b>Nombre disponible:</b> <?= $product->nb ?></p>
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