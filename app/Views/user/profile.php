<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>



<?php

use App\Models\UserModel;

$modeluser = new UserModel();
$dataUser = $modeluser->join('tb_role', 'tb_role.id_role = tb_user.id_role')->find(session()->get('id_role'));

?>

<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img class="card-img" src="<?= base_url(); ?>assets/img/undraw_profile.svg" alt="User">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $dataUser['username']; ?>(<?= $dataUser['nama_role']; ?>)</h5>
                <p class="card-text"><?= $dataUser['email']; ?></p>
                <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', strtotime($dataUser['created_at'])); ?></small></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>