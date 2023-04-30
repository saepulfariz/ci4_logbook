<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>





<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img class="card-img" src="<?= base_url(); ?>assets/img/profile/<?= $user['gambar']; ?>" alt="User">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <p class="card-text mb-1">Username : <?= $user['username']; ?>(<?= $user['nama_role']; ?>)</p>
                <p class="card-text mb-1">NPM : <?= $user['npm']; ?></p>
                <p class="card-text mb-1">Email : <?= $user['email']; ?></p>
                <p class="card-text mb-1">MBKM : <?= $user['nama_kategori']; ?></p>
                <p class="card-text mb-1">Pleace/Title : <?= $user['tempat_mbkm']; ?></p>
                <p class="card-text mb-1"><small class="text-muted">Member since <?= date('d F Y', strtotime($user['created_at'])); ?></small></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>