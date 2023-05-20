<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Logbook</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <div class="row mb-2">
            <div class="col-md-1">

                <a href="<?= base_url('logbook/new'); ?>" class="btn btn-primary mb-2">New</a>
            </div>
            <?php if ($mahasiswa == '') : ?>
                <div class="col-md-4">

                    <button id="export" class="btn btn-danger mb-2 me-2">PDF</button>
                    <button id="excel" class="btn btn-success mb-2">Excel</button>

                    <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#exampleModal">
                        Import
                    </button>


                    <script>
                        document.getElementById('export').addEventListener('click', function() {
                            var link = '<?= base_url('logbook/export'); ?>';
                            window.location.href = link;
                        })

                        document.getElementById('excel').addEventListener('click', function() {
                            var link = '<?= base_url('logbook/excel'); ?>';

                            window.location.href = link;
                        })
                    </script>
                </div>
            <?php else : ?>

                <div class="col-md-3 col-9">

                    <select name="id_user" id="id_user" class="form-control">
                        <option value="">==ALL==</option>
                        <?php foreach ($mahasiswa as $d) : ?>

                            <option value="<?= $d['id_user']; ?>"><?= $d['npm']; ?> | <?= $d['nama_lengkap']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-4">

                    <button id="export" class="btn btn-danger mb-2 me-2">PDF</button>
                    <button id="excel" class="btn btn-success mb-2">Excel</button>

                    <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#exampleModal">
                        Import
                    </button>

                </div>



                <script>
                    document.getElementById('export').addEventListener('click', function() {
                        var idUser = document.getElementById('id_user').value;
                        if (idUser == '') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Warning',
                                text: 'Pilih salah satu user.'
                            })
                        } else {
                            var link = '<?= base_url('logbook/export'); ?>' + '/' + idUser;
                        }

                        window.location.href = link;
                    })

                    document.getElementById('excel').addEventListener('click', function() {
                        var idUser = document.getElementById('id_user').value;
                        if (idUser == '') {
                            var link = '<?= base_url('logbook/excel'); ?>'
                        } else {
                            var link = '<?= base_url('logbook/excel'); ?>' + '/' + idUser;
                        }

                        window.location.href = link;
                    })
                </script>
            <?php endif; ?>
        </div>
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('logbook/import'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Logbook</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Import excel dengan contoh di bawah ini <a target="_blank" href="<?= base_url('IMPORT_LOGBOOK.xlsx'); ?>">Disni</a></p>

                    <div class="input-group mb-3">
                        <input type="file" class="form-control" placeholder="file" required name="upload_file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection('content') ?>