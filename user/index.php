<?php
  session_start();

  if(empty($_SESSION['log_status']))
  {
    header('location: lost_session.php');
  }
  require '../koneksi/koneksi.php';
  $username = $_SESSION['username'];
  $database = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username='$username' UNION SELECT * FROM dosen WHERE username='$username'");
  $data = mysqli_fetch_assoc($database);

// ambil logo
$identitas_kampus = mysqli_query($koneksi, "SELECT * FROM identitas_kampus");
$get_data = mysqli_fetch_assoc($identitas_kampus);

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
    <meta name="keywords" content="e-pilkebem">
    <meta name="author" content="colorlib" />
    <!-- Favicon icon -->
    <link rel="icon" href="../assets/logo/<?= $get_data['logo'] ?>" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../assets/admindek-html/files/bower_components/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
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
    <style>
        .text-bold{
            font-weight: 700;
        }

        .table-bordered{
            border: 1px none #fff;
        }
    </style>
</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <!-- [ Pre-loader ] end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
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
                                <h6><?=  $hari ?>, <?=date('d-m-Y')?></h5>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            
                            <li class="user-profile header-notification">

                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <?php
                                          if($data['jenis_kelamin'] == "L")
                                          {
                                            ?>
                                              <img src="../assets/img/male.jpg" class="img-radius" alt="User-Profile-Image">
                                            <?php
                                          }elseif($data['jenis_kelamin'] == "P")
                                          {
                                            ?>
                                              <img src="../assets/img/female.jpg" class="img-radius" alt="User-Profile-Image">
                                            <?php
                                          }
                                            
                                           
                                        ?>
                                        <span><?= $data['nama'] ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="login/logout.php">
                                                <i class="feather icon-log-out"></i> Logout
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
                    <?php  require 'template/sidebar.php'; ?>
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
    <script>
        $(document).ready( function () {
            $('#example').DataTable();
        });

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
    <!-- Float Chart js -->
    <script src="../assets/admindek-html/files/assets/pages/chart/float/jquery.flot.js"></script>
    <script src="../assets/admindek-html/files/assets/pages/chart/float/jquery.flot.categories.js"></script>
    <script src="../assets/admindek-html/files/assets/pages/chart/float/curvedLines.js"></script>
    <script src="../assets/admindek-html/files/assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>
    <!-- Chartlist charts -->
    <script src="../assets/admindek-html/files/bower_components/chartist/js/chartist.js"></script>
    <!-- amchart js -->
    <script src="../assets/admindek-html/files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="../assets/admindek-html/files/assets/pages/widget/amchart/serial.js"></script>
    <script src="../assets/admindek-html/files/assets/pages/widget/amchart/light.js"></script>
    <!-- Custom js -->
    <script src="../assets/admindek-html/files/assets/pages/data-table/js/data-table-custom.js"></script>
    <script src="../assets/admindek-html/files/assets/js/pcoded.min.js"></script>
    <script src="../assets/admindek-html/files/assets/js/vertical/vertical-layout.min.js"></script>
    <script type="text/javascript" src="../assets/admindek-html/files/assets/pages/dashboard/custom-dashboard.min.js"></script>
    <script type="text/javascript" src="../assets/admindek-html/files/assets/js/script.min.js"></script>
    
</body>
</html>