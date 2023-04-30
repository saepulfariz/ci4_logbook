<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Kategori</h1>
</div>

<!-- Content Row -->
<form action="<?= base_url('kategori'); ?>" method="post">
    <div class="row">
        <div class="col-md-5 mb-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New Kategori</h6>
                </div>
                <div class="card-body">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control <?= (validation_show_error('nama_kategori')) ? 'border-danger text-danger' : '' ?>" name="nama_kategori" id="nama_kategori" value="<?= old('nama_kategori'); ?>">
                        <?= validation_show_error('nama_kategori') ?>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control <?= (validation_show_error('kode')) ? 'border-danger text-danger' : '' ?>" name="kode" id="kode" value="<?= old('kode'); ?>">
                        <?= validation_show_error('kode') ?>
                    </div>

                    <div class="form-group">
                        <label for="is_pleace">Pleace</label>
                        <select name="is_pleace" id="is_pleace" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        <?= validation_show_error('is_pleace') ?>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    <a href="<?= base_url('kategori'); ?>" class="btn btn-sm btn-secondary">Batal</a>

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