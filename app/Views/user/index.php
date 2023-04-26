<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola User</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <a href="<?= base_url('user/new'); ?>" class="btn btn-primary mb-2 btn-sm">New</a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>NPM</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $d) : ?>

                                <tr>
                                    <td><?= $d['nama_lengkap']; ?></td>
                                    <td><?= $d['username']; ?></td>
                                    <td><?= $d['npm']; ?></td>
                                    <td><?= $d['email']; ?></td>
                                    <td><?= $d['nama_role']; ?></td>
                                    <td>
                                        <?php if ($d['is_active'] == 1) : ?>
                                            <a class="btn btn-success btn-sm" href="<?= base_url('user/active/' . $d['id_user'] . '/0'); ?>">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        <?php else : ?>
                                            <a class="btn btn-danger btn-sm" href="<?= base_url('user/active/' . $d['id_user'] . '/1'); ?>">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm mb-2" href="<?= base_url('user/' . $d['id_user'] . '/edit'); ?>">Edit</a>
                                        <form action='<?= base_url('user') . '/' . $d['id_user']; ?>' method='post' enctype='multipart/form-data'>
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