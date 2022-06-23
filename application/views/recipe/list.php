<div class="row">
    <div class="col-sm-12">
        <h2>Liste des recettes</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Ingrédients</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($recipes) && !empty($recipes)) :
                        foreach($recipes as $recipe) :
                ?>
                        <tr>
                            <td><?= $recipe->id ?></td>
                            <td><?= $recipe->name ?></td>
                            <td>
                                <a href="<?= site_url("recipe/recipeDetails?id=$recipe->id") ?>">
                                    <i class="fa fa-list"></i>
                                </a>
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