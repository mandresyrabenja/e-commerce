<div class="row">
    <div class="col-sm-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Quantité par unité</th>
                    <th>Quantité en stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($products) && !empty($products)) :
                        foreach($products as $product) :
                ?>
                        <tr>
                            <td><?= $product->id ?></td>
                            <td><?= $product->name ?></td>
                            <td><?= $product->price ?></td>
                            <td><?= $product->brand ?></td>
                            <td><?= $product->quantity ?><?= $product->unit ?></td>
                            <td><?= $product->nb ?></td>
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
        <ul class="pagination">
            <?php if( ($prevPage > 0) && ($nbPage != 1)) : ?>
                <li>
                    <a href="<?= site_url("product/getProductPageAdmin?pageSize=6&currPage=$prevPage") ?>" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </li>
            <?php endif ?>
            <?php 
                if(isset($nbPage) && $nbPage > 0) :
                    for($i = 1; $i <= $nbPage; $i++) :
            ?>
                <li <?php if($i == $currPage) : ?> class="active" <?php endif ?> >
                    <a href="<?= site_url("product/getProductPageAdmin?pageSize=6&currPage=$i") ?>"><?= $i ?></a>
                </li>
            <?php 
                    endfor;
                endif; 
            ?>
            <?php if(($nextPage < $nbPage) && ($nbPage != 1)) : ?>
                <li>
                    <a href="<?= site_url("product/getProductPageAdmin?pageSize=6&currPage=$nextPage") ?>" class="btn btn-warning">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </li>
            <?php endif ?>
        </ul> 
    </div>
</div>