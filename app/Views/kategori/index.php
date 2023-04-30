<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Kategori</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <a href="<?= base_url('kategori/new'); ?>" class="btn btn-primary mb-2 btn-sm">New</a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Kategori</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Kode</th>
                                <th>Pleace</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1;
                            foreach ($kategori as $d) : ?>

                                <tr>
                                    <td><?= $a++; ?></td>
                                    <td><?= $d['nama_kategori']; ?></td>
                                    <td><?= $d['kode']; ?></td>
                                    <td><?= ($d['is_pleace'] == 1) ? 'Yes' : 'No'; ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm mb-2" href="<?= base_url('kategori/' . $d['id_kategori'] . '/edit'); ?>">Edit</a>
                                        <form action='<?= base_url('kategori') . '/' . $d['id_kategori']; ?>' method='post' enctype='multipart/form-data'>
                                            <input type='hidden' name='_method' value='DELETE' />
                                            <!-- GET, POST, PUT, PATCH, DELETE-->
                                            <?= csrf_field(); ?>
                                            <button type="button" onclick="deleteTombol(this)" class="btn btn-danger btn-sm mb-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection('content') ?>