
	<section id="cart_items">
		<div class="container">

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Article</td>
							<td class="description"></td>
							<td class="price">Prix</td>
							<td class="quantity">Quantité</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php 
							if(isset($carts) && !empty($carts)) :
								for($i = 0; $i < count($carts); $i++) :
									$plus = $carts[$i]['nb'] + 1;
									$minus = $carts[$i]['nb'] - 1;
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?= img_url('cart/one.png') ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?= $carts[$i]['productName'] ?></a></h4>
								<p>Réference: <?= $carts[$i]['productId'] ?></p>
							</td>
							<td class="cart_price">
								<p><?= $carts[$i]['unitPrice'] ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="<?= site_url("cart/modifyNb?index=$i&nb=$plus") ?>"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?= $carts[$i]['nb'] ?>" autocomplete="off" readonly>
									<a class="cart_quantity_down" href="<?= site_url("cart/modifyNb?index=$i&nb=$minus") ?>"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?= $carts[$i]['amount'] ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php
								endfor;
							endif;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->