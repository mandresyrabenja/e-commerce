<div class="row">
    <div class="text-center">
        <b>Vous avez actuellement <?= isset($money) ? $money : 0 ?> jeton(s).</b>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <div class="login-form">
            <!--login form-->
            <h2>Ajouter des jetons à votre compte</h2>
            <form method="POST" action="<?= site_url('customer/rechargeAccount') ?>">
                <input type="number" name="money" required />
                <button type="submit" class="btn btn-default">Ajouter</button>
            </form>
        </div>
        <!--/login form-->
    </div>             
    <div class="col-sm-3"></div>
</div>