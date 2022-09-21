<?php
session_start();
if (empty($_SESSION['login'])) {
    header('location: lost_session.php');
} elseif ($_SESSION['status_akun'] == "N") {
    header('location: lost_active.php');
}

require '../koneksi/koneksi.php';
$username = $_SESSION['username'];

// data user admin
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
$data = mysqli_fetch_assoc($query);

// jika akun sudah di blok user masih dalam keadaan login
if ($data['status_akun'] == "N") {
    header('location: lost_active.php');
}

// hak akses admin
$hak_akses_admin = mysqli_query($koneksi, "SELECT * FROM akses_menu WHERE username='$username'");
$akses = mysqli_fetch_assoc($hak_akses_admin);

$id = $data['id'];
$query_akses = mysqli_query($koneksi, "SELECT * FROM akses_menu WHERE id='$id'");
$hak_akses = mysqli_fetch_assoc($query_akses);


// ambil data identitas kampus

$kampus = mysqli_query($koneksi, "SELECT * FROM identitas_kampus");
$get_data = mysqli_fetch_assoc($kampus);
?>


<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>E-PILKEBEM | <?= date('Y'); ?></title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Aplikasi E-PILKEBEM" />
    <meta name="keywords" content="pemilihan ketua bem stmik pgri tangerang">
    <meta name="author" content="fajarsaputra_dev19" />
    <!-- Favicon icon -->
    <link rel="icon" href="../assets/logo/<?= $get_data['logo'] ?>" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" href="../assets/admindek-html/files/bower_components/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
    <!-- datepicker bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="../assets/admindek-html/files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="../assets/admindek-html/files/assets/icon/feather/css/feather.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="../assets/admindek-html/files/assets/css/font-awesome-n.min.css">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="../assets/admindek-html/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admindek-html/files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admindek-html/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- Chartlist chart css -->
    <link rel="stylesheet" href="../assets/admindek-html/files/bower_components/chartist/css/chartist.css" type="text/css" media="all">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../assets/admindek-html/files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/admindek-html/files/assets/css/widget.css">
    <link rel="stylesheet" href="../assets/css/mystyle.css">
    <!-- editor html -->
    <link rel="stylesheet" href="../assets/editor/editor/summernote-bs4.css">
</head>

<body id="nopadding">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <!-- [ Pre-loader ] end -->
    <div id="pcoded" class="pcoded">
        <!-- <div class="pcoded-overlay-box"></div> -->
        <div class="navbar-wrapper">
            <!-- [ Header ] start -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo justify-content-lg-center">
                        <a href="#!">
                            <b class="text-center">E-Pilkebem <?= date('Y') ?></b>
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search mt-4">
                                <?php
                                require 'template/day-id.php';
                                ?>
                                <h6><?= $hari ?>, <?= date('d-m-Y') ?></h5>
                            </li>
                        </ul>
                        <ul class="nav-right">

                            <li class="user-profile header-notification">

                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <?php
                                        if (empty($data['foto'])) {
                                            if ($data['jenis_kelamin'] == "Laki-Laki") {
                                        ?>
                                                <img src="../assets/img/male.jpg" class="img-radius" alt="User-Profile-Image">
                                            <?php
                                            } elseif ($data['jenis_kelamin'] == "Perempuan") {
                                            ?>
                                                <img src="../assets/img/female.jpg" class="img-radius" alt="User-Profile-Image">
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <img src="../assets/img/<?= $data['foto'] ?>" width="50" height="40" class="img-radius" alt="User-Profile-Image">
                                        <?php
                                        }
                                        ?>
                                        <span><?= $data['nama'] ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a onclick="javascript:document.location.href='?page=profile'">
                                                <i class="fas fa-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a onclick="javascript:document.location.href='?page=update_password'">
                                                <i class="fas fa-key"></i> Update Password

                                            </a>
                                        </li>
                                        <li>
                                            <a onclick="javascript:document.location.href='login/logout.php'">
                                                <i class="fas fa-sign-out-alt"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                    <?php require 'template/sidebar.php'; ?>
                    <!-- [ navigation menu ] end -->
                    <?php require 'template/page.php'; ?>
                </div>
                <!-- [ style Customizer ] end -->
            </div>
        </div>
    </div>
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="../assets/admindek-html/files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/admindek-html/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../assets/admindek-html/files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="../assets/admindek-html/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- waves js -->
    <script src="../assets/admindek-html/files/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../assets/admindek-html/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- data-table js -->
    <script src="../assets/admindek-html/files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/admindek-html/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/admindek-html/files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="../assets/admindek-html/files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="../assets/admindek-html/files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="../assets/admindek-html/files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/admindek-html/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/admindek-html/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/admindek-html/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/admindek-html/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- date picker -->
    <script src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $(document).ready(function() {
            $('#akun-admin').DataTable({
                lengthMenu: [5,10,25,100]
            });
        });

        $("#tanggal").datepicker({
            format: 'dd-mm-yyyy',
            autoHighlight: true,
            autoClose: true
        });

        $("#tanggal2").datepicker({
            format: 'dd-mm-yyyy',
            autoHighlight: true,
            autoClose: true
        });

        function reload() {
            location.reload();
        }

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        window.setTimeout(function() {
            $("#auto-close").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>
    <!-- Custom js -->
    <script src="../assets/admindek-html/files/assets/pages/data-table/js/data-table-custom.js"></script>
    <script src="../assets/admindek-html/files/assets/js/pcoded.min.js"></script>
    <script src="../assets/admindek-html/files/assets/js/vertical/vertical-layout.min.js"></script>
    <script type="text/javascript" src="../assets/admindek-html/files/assets/pages/dashboard/custom-dashboard.min.js"></script>
    <script type="text/javascript" src="../assets/admindek-html/files/assets/js/script.min.js"></script>

    <!-- editor html js -->
    <!-- <script src="../assets/editor/jquery/jquery-3.3.1.min.js"></script> -->
    <script src="../assets/editor/jquery/popper.min.js"></script>
    <script src="../assets/editor/editor/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit').summernote({
                placeholder: 'Tulis Sesuatu ...',
                tabsize: 4,
                tabDisable: true,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline']]
                ]
            });
        });


        $(document).ready(function() {
            $('#identitas_kampus').load('ajax/identitas_kampus.php');
            $('#pengaturan').load('ajax/pengaturan.php');
            $('#reset-peserta').load('ajax/reset-peserta.php');
        });

        document.getElementById('nopadding').style='';
        $("#pass_new").load('ajax/password-mhs_new.php');
        $('#generate_password').on('click', function(){
            $("#pass_new").load('ajax/password-mhs_new.php');
        })
    </script>

</body>

</html>