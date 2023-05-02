<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Logbook</h1>
</div>

<!-- Content Row -->
<form action="<?= base_url('logbook/' . $logbook['id_logbook']); ?>" method="post">
    <div class="row">
        <div class="col-md-5 mb-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Logbook</h6>
                </div>
                <div class="card-body">
                    <?= csrf_field(); ?>
                    <input type='hidden' name='_method' value='PUT' />
                    <!-- GET, POST, PUT, PATCH, DELETE-->
                    <div class="form-group">
                        <label for="tanggal">Date</label>
                        <input type="date" class="form-control <?= (validation_show_error('tanggal')) ? 'border-danger text-danger' : '' ?>" name="tanggal" id="tanggal" value="<?= $logbook['tanggal']; ?>">
                        <?= validation_show_error('tanggal') ?>
                    </div>
                    <div class="form-group">
                        <label for="mulai">Start</label>
                        <input type="time" class="form-control <?= (validation_show_error('mulai')) ? 'border-danger text-danger' : '' ?>" name="mulai" id="mulai" value="<?= $logbook['mulai']; ?>">
                        <?= validation_show_error('mulai') ?>
                    </div>

                    <div class="form-group">
                        <label for="selesai">End</label>
                        <input type="time" class="form-control <?= (validation_show_error('selesai')) ? 'border-danger text-danger' : '' ?>" name="selesai" id="selesai" value="<?= $logbook['selesai']; ?>">
                        <?= validation_show_error('selesai') ?>
                    </div>

                    <div class="form-group">
                        <label for="penjelasan">Description</label>
                        <textarea class="form-control <?= (validation_show_error('penjelasan')) ? 'border-danger text-danger' : '' ?>" name="penjelasan" id="penjelasan"><?= $logbook['penjelasan']; ?></textarea>
                        <?= validation_show_error('penjelasan') ?>
                    </div>




                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    <a href="<?= base_url('logbook'); ?>" class="btn btn-sm btn-secondary">Batal</a>

                </div>
            </div>

        </div>

    </div>
</form>

<?= $this->endSection('content') ?>



<?= $this->section('script') ?>
<script>
</script>
<?= $this->endSection('script') ?>