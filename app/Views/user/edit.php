<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola User</h1>
</div>

<!-- Content Row -->
<form action="<?= base_url('user/' . $user['id_user']); ?>" method="post">
    <div class="row">
        <div class="col-md-5 mb-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
                </div>
                <div class="card-body">
                    <input type='hidden' name='_method' value='PUT' />
                    <!-- GET, POST, PUT, PATCH, DELETE-->
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="nama_lengkap">Full Name</label>
                        <input type="text" class="form-control <?= (validation_show_error('nama_lengkap')) ? 'border-danger text-danger' : '' ?>" name="nama_lengkap" id="nama_lengkap" value="<?= (old('nama_lengkap')) ? old('nama_lengkap') : $user['nama_lengkap']; ?>">
                        <?= validation_show_error('nama_lengkap') ?>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control <?= (validation_show_error('username')) ? 'border-danger text-danger' : '' ?>" name="username" id="username" value="<?= (old('username')) ? old('username') : $user['username']; ?>">
                        <?= validation_show_error('username') ?>
                    </div>


                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control <?= (validation_show_error('password')) ? 'border-danger text-danger' : '' ?>" name="password" id="password" value="">
                        <?= validation_show_error('password') ?>
                    </div>

                    <div class="form-group">
                        <label for="id_role">Role</label>
                        <select name="id_role" id="id_role" class="form-control">
                            <?php foreach ($role as $d) : ?>
                                <?php if ($d['id_role'] == $user['id_role']) : ?>

                                    <option selected value="<?= $d['id_role']; ?>"><?= $d['nama_role']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $d['id_role']; ?>"><?= $d['nama_role']; ?></option>

                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?= validation_show_error('id_role') ?>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-5">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control <?= (validation_show_error('email')) ? 'border-danger text-danger' : '' ?>" name="email" id="email" value="<?= (old('email')) ? old('email') : $user['email']; ?>">
                        <?= validation_show_error('email') ?>
                    </div>

                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="text" class="form-control <?= (validation_show_error('npm')) ? 'border-danger text-danger' : '' ?>" name="npm" id="npm" value="<?= (old('npm')) ? old('npm') : $user['npm']; ?>">
                        <?= validation_show_error('npm') ?>
                    </div>


                    <div class="form-group">
                        <label for="id_kategori">MBKM</label>
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

                    <div class="form-group">
                        <label for="tempat_mbkm">Pleace MBKM</label>
                        <input type="text" class="form-control <?= (validation_show_error('tempat_mbkm')) ? 'border-danger text-danger' : '' ?>" name="tempat_mbkm" id="tempat_mbkm" value="<?= (old('tempat_mbkm')) ? old('tempat_mbkm') : $user['tempat_mbkm']; ?>">
                        <?= validation_show_error('tempat_mbkm') ?>
                    </div>


                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    <a href="<?= base_url('user'); ?>" class="btn btn-sm btn-secondary">Batal</a>
                </div>
            </div>
        </div>

    </div>
</form>

<?= $this->endSection('content') ?>



<?= $this->section('script') ?>
<script>
    function generateUser() {
        var user = $('#username').val();

        $('#npm').val(user);
    }


    $('#username').on('keyup', generateUser);
</script>
<?= $this->endSection('script') ?>