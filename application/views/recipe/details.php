<div class="row">
    <div class="col-sm-12">
        <h2>Ingrédient <?php if(isset($recipe)) : ?> de <?= $recipe->name ?> <?php endif ?></h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($recipeDetails) && !empty($recipeDetails)) :
                        foreach($recipeDetails as $r) :
                ?>
                        <tr>
                            <td><?= $r->product_name ?></td>
                            <td><?= $r->quantity ?><?= $r->unit ?></td>
                        </tr>
                <?php
                        endforeach;
                    endif;
                ?>
            </tbody>
        </table>

    </div>
</div>
<div class="row">
	<div class="col-sm2"></div>
	<div class="col-sm-8">
	<form action="<?= site_url('recipe/addIngredient') ?>" method="POST" role="form">
		<legend>Ajouter un ingrédient</legend>

		<div class="form-group">
			<label for="product_id">Ingrédient</label>
			<select name="product_id" id="product_id" required>
				<?php if(isset($products) && !empty($products)) : 
					foreach($products as $product) :	
				?>
					<option value="<?= $product->id ?>"><?= $product->name ?></option>
				<?php 
					endforeach;
					endif; 
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="quantity">Quantité</label>
			<input type="number" class="form-control" id="quantity" name="quantity" required>
		</div>
		<div class="form-group">
			<input type="number" value="<?php if(isset($recipe)) echo $recipe->id; ?>" class="hidden" id="recipe_id" name="recipe_id" required>
		</div>

		<button type="submit" class="btn btn-warning">Créer</button>
	</form>

	</div>
	<div class="col-sm2"></div>
</div>
