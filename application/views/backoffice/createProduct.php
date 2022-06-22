
<div class="row">
	<div class="col-sm2"></div>
	<div class="col-sm-8">
	<form action="#" method="POST" role="form">
		<legend>Créer un article</legend>

		<div class="form-group">
			<label for="name">Nom</label>
			<input type="text" class="form-control" id="name" name="name" required>
		</div>
		<div class="form-group">
			<label for="brand">Marque</label>
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
