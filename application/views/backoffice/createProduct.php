
<div class="row">
	<div class="col-sm2"></div>
	<div class="col-sm-8">
	<form action="<?= site_url('product/createProduct') ?>" method="POST" role="form">
		<legend>Créer un article</legend>

		<div class="form-group">
			<label for="name">Nom</label>
			<input type="text" class="form-control" id="name" name="name" required>
		</div>
		<div class="form-group">
			<label for="brand">Catégorie</label>
			<select name="brand" id="brand" required>
				<?php if(isset($brands) && !empty($brands)) : 
					foreach($brands as $brand) :	
				?>
					<option value="<?= $brand->id ?>"><?= $brand->name ?></option>
				<?php 
					endforeach;
					endif; 
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="unit">Unité de mesure</label>
			<select name="unit" id="unit" required>
				<option value="g">Gramme</option>
				<option value="ml">Millilitre</option>
				<option value="unite">Unité</option>
			</select>
		</div>
		<div class="form-group">
			<label for="quantity">Quantité par conteneur(sachet, carton, ...)</label>
			<input type="number" class="form-control" id="quantity" name="quantity" required>
		</div>
		<div class="form-group">
			<label for="price">Prix</label>
			<input type="number" class="form-control" id="price" name="price" required>
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea name="description" id="description" cols="30" rows="10" required></textarea>
		</div>
		<div class="form-group">
			<label for="nb">Nombre en stock</label>
			<input type="number" class="form-control" id="nb" name="nb" required>
		</div>

		<button type="submit" class="btn btn-warning">Créer</button>
	</form>

	</div>
	<div class="col-sm2"></div>
</div>
