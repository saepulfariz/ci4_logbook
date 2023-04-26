<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola User</h1>
</div>

<!-- Content Row -->
<form action="<?= base_url('gantipass'); ?>" method="post">
    <div class="row">
        <div class="col-md-5 mb-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                </div>
                <div class="card-body">
                    <?= csrf_field(); ?>


                    <div class="form-group">
                        <label for="password_lama">Password Old</label>
                        <input type="password" class="form-control <?= (validation_show_error('password_lama')) ? 'border-danger text-danger' : '' ?>" name="password_lama" id="password_lama">
                        <?= validation_show_error('password_lama') ?>
                    </div>

                    <div class="form-group">
                        <label for="password_baru">Password New</label>
                        <input type="password" class="form-control <?= (validation_show_error('password_baru')) ? 'border-danger text-danger' : '' ?>" name="password_baru" id="password_baru">
                        <?= validation_show_error('password_baru') ?>
                    </div>


                    <div class="form-group">
                        <label for="password_retype">Password Retype</label>
                        <input type="password" class="form-control <?= (validation_show_error('password_retype')) ? 'border-danger text-danger' : '' ?>" name="password_retype" id="password_retype">
                        <?= validation_show_error('password_retype') ?>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    <a href="<?= base_url('dashboard'); ?>" class="btn btn-sm btn-secondary">Batal</a>

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