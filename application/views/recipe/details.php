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
                            <td><?= $r->quantity ?></td>
                        </tr>
                <?php
                        endforeach;
                    endif;
                ?>
            </tbody>
        </table>

    </div>
</div>