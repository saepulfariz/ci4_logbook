<!DOCTYPE html>
<html lang="en">

<?php

$alert = new App\Libraries\Alert();


?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?> - LOGBOOK (PROFA)</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        #lupa-wae {
            cursor: pointer;
        }


        #lupa-wae:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <?= $alert->get(); ?>

    <div class="container">

        <?= $this->renderSection('content'); ?>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <?= $alert->init('jquery'); ?>

    <?= $this->renderSection('script'); ?>


    <script>
        $('#lupa-wae').on('click', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Lakh kok bisa lupa?',
                text: 'Belum ada fiktur nya, mungkin butuh donasi kali ^_^, bisa contact admin nya..'
            })
        })
    </script>

</body>

</html>