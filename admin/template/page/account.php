<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-xl-12 col-sm-12">
                <h5>Manajemen Akun</h5>
                <div class="mt-4">
                    <?php
                    if ($akses['manajemen_akun'] == "Y") {
                    ?>
                        <button class="tmb tmb-success bg-success text-white" data-toggle="modal" data-target="#add"><em class="fas fa-user-plus"></em> Tambah Admin</button>

                        <!-- modal -->
                        <div class="modal fade" id="add" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Admin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../proses/tambah/account.php" method="post" autocomplete="off" class="needs-validation" novalidate>
                                            <div class="form-group">
                                                <label class="form-label">Nama</label>
                                                <input type="text" name="nama" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <div class="mb-2">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input class="custom-control-input" type="radio" name="jenis_kelamin" id="jkl1" value="Laki-Laki" required>
                                                        <label class="custom-control-label" for="jkl1">L</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input class="custom-control-input" type="radio" name="jenis_kelamin" id="jkl2" value="Perempuan" required>
                                                        <label class="custom-control-label" for="jkl2">P</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                            <input type="text" name="status_akun" value="Y" style="display: none;">
                                            <input type="text" name="foto" value="" style="display: none;">
                                            <input type="text" name="level" value="Admin" style="display: none;">
                                            <div class="modal-footer">
                                                <button type="submit" name="tambah" class="tmb tmb-primary">Tambah</button>
                                                <button type="button" class="tmb tmb-danger" data-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->

                        <div class="mt-4">
                            <?php
                            if (isset($_SESSION['val']) && $_SESSION['val']) {
                                echo $_SESSION['val'];
                                unset($_SESSION['val']);
                            }
                            ?>
                        </div>

                        <!-- data akun admin -->
                        <div class="card">
                            <div class="card-body">
                                <table id="akun-admin" class="table table-responsive table-hover table-xs nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>JK</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Status Akun</th>
                                            <th>Hak Akses</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query_admin = mysqli_query($koneksi, "SELECT * FROM admin INNER JOIN akses_menu ON admin.id = akses_menu.id");
                                        foreach ($query_admin as $data) :
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($data['jenis_kelamin'] == "Laki-Laki") {
                                                        echo "L";
                                                    } elseif ($data['jenis_kelamin'] == "Perempuan") {
                                                        echo "P";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $data['username'] ?></td>
                                                <td><?= $data['password'] ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if (empty($data['status_akun'])) {
                                                    } elseif ($data['status_akun'] == "Y") {
                                                    ?>
                                                        <p class="fas fa-check text-success"></p>
                                                    <?php
                                                    } elseif ($data['status_akun'] == "N") {
                                                    ?>
                                                        <p class="fas fa-times text-danger"></p>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a class="access" data-id="<?= $data['id'] ?>">
                                                        <button class="tmb tmb-info"><em class="fas fa-user-times"></em></button>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="update" data-id="<?= $data['id'] ?>">
                                                        <button class="tmb tmb-primary"><em class="fas fa-edit"></em></button>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a data-toggle="modal" data-target="#delete<?= $data['id'] ?>">
                                                        <button class="tmb tmb-danger"><em class="fas fa-trash"></em></button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            require 'btn/hak_akses.php';
                                            require 'btn/update_account.php';
                                            require 'btn/delete_account.php';
                                            ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end data akun admin -->
                    <?php
                    } elseif ($akses['manajemen_akun'] == "N") {
                    ?>
                        <div class="alert alert-warn"><em class="fas fa-info"></em> Anda Tidak Memiliki Akses Untuk Mengakses Halaman Ini !</div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../assets/admindek-html/files/bower_components/jquery/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        // action edit account admin
        $(".update").on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: 'ajax/update_admin.php',
                data: {
                    id: id
                },
                success: function(respond) {
                    $("#update_account").modal('show');
                    $("#form-update-admin").html(respond);
                }
            });
        });

        // action akses menu settings
        $(".access").on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: 'ajax/akses-set.php',
                data: {
                    id: id
                },
                success: function(respond) {
                    $('#form-akses').html(respond);
                    $("#hak_akses").modal('show');
                }
            });
        });
    });
</script>