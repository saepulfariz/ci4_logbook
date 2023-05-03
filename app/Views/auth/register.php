<?= $this->extend('auth/index') ?>


<?= $this->section('content') ?>

<style>
    select::placeholder {
        font-weight: bold;
        opacity: 0.5;
        color: red;
    }

    select.form-control-kategori {
        display: block;
        width: 100%;
        /* height: calc(0.5em + 0.75rem + 1px); */
        /* padding: 0.375rem 0.25rem;
        font-size: 1rem; */
        font-weight: 400;
        line-height: 1.5;
        color: #6e707e;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #d1d3e2;
        border-radius: 0.35rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

        font-size: .8rem;
        border-radius: 10rem;
        padding: 1rem 1rem;

    }
</style>
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7 col-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
                                <?= csrf_field(); ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="nama_lengkap" class="form-control form-control-user <?= (validation_show_error('nama_lengkap', 'my_single')) ? 'border-danger text-danger' : ''; ?>" id="exampleFirstName" placeholder="Full Name" value="<?= old('nama_lengkap'); ?>">
                                        <?= validation_show_error('nama_lengkap', 'my_single'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="npm" class="form-control form-control-user <?= (validation_show_error('npm', 'my_single')) ? 'border-danger text-danger' : ''; ?>" id="exampleLastName" placeholder="NPM" value="<?= old('npm'); ?>">
                                        <?= validation_show_error('npm', 'my_single'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user <?= (validation_show_error('email', 'my_single')) ? 'border-danger text-danger' : ''; ?>" id="exampleInputEmail" placeholder="Email Address" value="<?= old('email'); ?>">
                                    <?= validation_show_error('email', 'my_single'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user <?= (validation_show_error('password', 'my_single')) ? 'border-danger text-danger' : ''; ?>" id="exampleInputPassword" placeholder="Password">
                                        <?= validation_show_error('password', 'my_single'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password1" class="form-control form-control-user <?= (validation_show_error('password1', 'my_single')) ? 'border-danger text-danger' : ''; ?>" id="exampleRepeatPassword" placeholder="Repeat Password">
                                        <?= validation_show_error('password1', 'my_single'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select name="id_kategori" id="id_kategori" class=" form-control-kategori" placeholder="Choose Category">
                                            <?php foreach ($kategori as $d) : ?>
                                                <option value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= validation_show_error('id_kategori', 'my_single'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="tempat_mbkm" class="form-control form-control-user" id="tempat_mbkm" placeholder="Pleace / Title MBKM">
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <span class="small text-primary" id="lupa-wae">Forgot Password?</span>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>

<?= $this->section('script') ?>
<script>
    // $('#id_kategori').on('change', function() {
    //     var idKategori = $(this).val();
    //     $.ajax({
    //         url: '<?= base_url('ajax/kategori'); ?>',
    //         method: 'GET', // POST
    //         data: {
    //             id_kategori: idKategori
    //         },
    //         dataType: 'json', // json
    //         success: function(data) {
    //             console.log(data);
    //             if (data.is_pleace == 1) {
    //                 $('#tempat_mbkm').removeClass('d-none');
    //             } else {
    //                 $('#tempat_mbkm').addClass('d-none');
    //             }
    //         }
    //     });

    // })
</script>
<?= $this->endSection('script') ?>