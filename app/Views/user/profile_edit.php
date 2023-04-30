<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola User</h1>
</div>

<!-- Content Row -->
<form action="<?= base_url('profile'); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8 mb-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
                </div>
                <div class="card-body">
                    <input type='hidden' name='_method' value='PUT' />
                    <!-- GET, POST, PUT, PATCH, DELETE-->
                    <?= csrf_field(); ?>

                    <div class="form-group row">
                        <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control <?= (validation_show_error('npm')) ? 'border-danger text-danger' : '' ?>" name="npm" id="npm" value="<?= $user['npm']; ?>">
                            <?= validation_show_error('npm') ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= (validation_show_error('nama_lengkap')) ? 'border-danger text-danger' : '' ?>" name="nama_lengkap" id="nama_lengkap" value="<?= $user['nama_lengkap']; ?>">
                            <?= validation_show_error('nama_lengkap') ?>
                        </div>
                    </div>




                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= (validation_show_error('email')) ? 'border-danger text-danger' : '' ?>" name="email" id="email" value="<?= $user['email']; ?>">
                            <?= validation_show_error('email') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_kategori" class="col-sm-2 col-form-label">MBKM</label>
                        <div class="col-sm-10">
                            <select name="id_kategori" id="id_kategori" class="form-control">
                                <?php foreach ($kategori as $d) : ?>
                                    <?php if ($d['id_kategori'] == $user['id_kategori']) : ?>

                                        <option selected value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <?= validation_show_error('id_kategori') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tempat_mbkm" class="col-sm-2 col-form-label">Pleace / Title MBKM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= (validation_show_error('tempat_mbkm')) ? 'border-danger text-danger' : '' ?>" name="tempat_mbkm" id="tempat_mbkm" value="<?= $user['tempat_mbkm']; ?>">
                            <?= validation_show_error('tempat_mbkm') ?>

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">
                            Picture
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/' . $user['gambar']); ?>" alt="" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file <?= (validation_show_error('gambar')) ? 'border-danger text-danger' : '' ?>">
                                        <input type="file" class="custom-file-input" name="gambar" id="customFile">
                                        <label for="customFile" class="custom-file-label">Choose File</label>
                                    </div>
                                    <?= validation_show_error('gambar') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</form>
<?= $this->endSection('content') ?>


<?= $this->section('script') ?>
<script>
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    })
</script>
<?= $this->endSection('script') ?>