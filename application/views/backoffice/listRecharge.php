<div class="row">
    <div class="col-sm-12">
        <h2>Liste des recharges non confirmés</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Montant</th>
                    <th colspan="2">Opération</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($recharges) && !empty($recharges)) :
                        foreach($recharges as $recharge) :
                ?>
                        <tr>
                            <td><?= $recharge->id ?></td>
                            <td><?= $recharge->customer_name ?></td>
                            <td><?= $recharge->amount ?></td>
                            <td>
                                <a href="<?= site_url("admin/validateRecharge?rechargeId=$recharge->id&customerId=$recharge->customer_id&amount=$recharge->amount") ?>">
                                    <i class="fa fa-check"></i>
                                </a>
                            </td>
                            <td>
                                <a href="<?= site_url("admin/deleteRecharge?rechargeId=$recharge->id") ?>"><i class="fa fa-times"></i></a>
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