<?php  if(isset($recipe)) : ?>
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
						<h2><?= $recipe->name ?></h2>
						<p>Réference: <?= $recipe->id ?></p>
						<span>
							<input type="hidden" name="recipeId" value="<?= $recipe->id ?>">
							<label>Quantité:</label>
								<input type="number" name="nb" value="1" min="1" />
								<button type="submit" class="btn btn-default cart">
									<i class="fa fa-shopping-cart"></i>
									Ajouter au panier
								</button>
						</span>
                        <?php
                            if(isset($recipeDetails) && !empty($recipeDetails)) :
                                foreach($recipeDetails as $r) :
                        ?>
						        <p><b><?= $r->product_name ?></b> <?= $r->quantity ?><?= $r->unit ?></p>
                        <?php
                                endforeach;
                            endif;
                        ?>
					</form>
				</div><!--/product-information-->
			</div>
		</div><!--/product-details-->
		
	</div>
</div>
<?php
	else :
		echo 'Aucune recette selectionnée';
	endif;
?>