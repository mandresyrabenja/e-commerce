<div class="row">
    <div class="col-sm-12">
        <h2>Top 3 des produits le plus vendus</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nombre de vente</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($productSales) && !empty($productSales)) :
                        foreach($productSales as $p) :
                ?>
                        <tr>
                            <td><?= $p->name ?></td>
                            <td><?= $p->nb ?></td>
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
    <div class="col-sm-12">
        <h2>Top 3 des recettes les plus vendus</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nombre de vente</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($recipeSales) && !empty($recipeSales)) :
                        foreach($recipeSales as $p) :
                ?>
                        <tr>
                            <td><?= $p->name ?></td>
                            <td><?= $p->nb ?></td>
                        </tr>
                <?php
                        endforeach;
                    endif;
                ?>
            </tbody>
        </table>

    </div>
</div>