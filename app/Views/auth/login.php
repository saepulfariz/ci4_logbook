<?= $this->extend('auth/index') ?>



<?= $this->section('content') ?>
<?php

// d($validation->getErrors());

// d(validation_list_errors());

// d(validation_show_error('username'));

// d($validation->showError('username'));

?>
<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome LogBook Generate!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user <?= (validation_show_error('username', 'my_single')) ? 'border-danger text-danger' : ''; ?>" id="username" aria-describedby="emailHelp" name="username" placeholder="Enter NPM or Email" value="<?= old('username'); ?>">
                                    <?= validation_show_error('username', 'my_single'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user <?= (validation_show_error('password', 'my_single')) ? 'border-danger text-danger' : ''; ?>" id="password" name="password" placeholder="Password">
                                    <?= (validation_show_error('password')) ? "<small class='text-danger pl-3'>" . validation_show_error('password') . "</small>" : ""; ?>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <span class="small text-primary" id="lupa-wae">Forgot Password?</span>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth/register'); ?>">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?= $this->endSection('content') ?>