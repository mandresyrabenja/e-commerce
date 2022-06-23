
<div class="row">
	<div class="col-sm2"></div>
	<div class="col-sm-8">
	<form action="<?= site_url('recipe/create') ?>" method="POST" role="form">
		<legend>Créer une récette</legend>

		<div class="form-group">
			<label for="name">Nom</label>
			<input type="text" class="form-control" id="name" name="name" required>
		</div>

		<button type="submit" class="btn btn-warning">Créer</button>
	</form>

	</div>
	<div class="col-sm2"></div>
</div>
