
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
								foreach($carts as $cart) :
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?= img_url('cart/one.png') ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?= $cart['productName'] ?></a></h4>
								<p>Réference: <?= $cart['productId'] ?></p>
							</td>
							<td class="cart_price">
								<p><?= $cart['unitPrice'] ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?= $cart['nb'] ?>" autocomplete="off" readonly>
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?= $cart['amount'] ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php
								endforeach;
							endif;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->