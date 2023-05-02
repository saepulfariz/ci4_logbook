<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Logbook</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <a href="<?= base_url('logbook/new'); ?>" class="btn btn-primary mb-2 btn-sm">New</a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Logbook</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Description</th>
                                <th>Signature</th>
                                <th>User</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1;
                            foreach ($logbook as $d) : ?>

                                <tr>
                                    <td><?= $a++; ?></td>
                                    <td><?= $d['tanggal']; ?></td>
                                    <td><?= $d['mulai']; ?></td>
                                    <td><?= $d['selesai']; ?></td>
                                    <td><?= $d['penjelasan']; ?></td>
                                    <td><?= $d['paraf']; ?></td>
                                    <td><?= $d['pembuat']; ?></td>
                                    <td><?= $d['created_at']; ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm mb-2" href="<?= base_url('logbook/' . $d['id_logbook'] . '/edit'); ?>">Edit</a>
                                        <form action='<?= base_url('logbook') . '/' . $d['id_logbook']; ?>' method='post' enctype='multipart/form-data'>
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