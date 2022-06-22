
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Marque</th>
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
                    <td><?= $product->nb ?></td>
                </tr>
        <?php
                endforeach;
            endif;
        ?>
    </tbody>
</table>
