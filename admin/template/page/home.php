<div class="pcoded-content">

    <!-- [ breadcrumb ] end -->
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <?php
                        if(isset($_SESSION['val'])){
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                        }
                    ?>
                    <!-- [ page content ] start -->
                    <div class="row">
                        <!-- sale revenue card start -->
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Identitas Kampus</h5>
                                </div>
                                <div class="card-block">
                                    <div id="validasi"></div>
                                    <div id="identitas_kampus"></div>
                                </div>
                            </div>
                        </div>

                        <!-- sale revenue card end -->


                        <!-- sale 2 card start -->
                        <div class="col-md-12 col-xl-4">
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    Pengaturan Informasi Kegiatan
                                </div>
                                <div class="card-block">
                                    <div id="message-pengaturan"></div>
                                    <div id="pengaturan"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12" <?php if($hak_akses['reset_peserta'] == 'N'){echo 'style="display:none;"';}; ?>>
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    Reset Akun Peserta Pemilihan
                                </div>
                                <div class="card-body">
                                    <div id="message-reset"></div>
                                    <div id="reset-peserta"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6" <?php if($hak_akses['reset_all'] == "N"){echo 'style="display:none"';}?>>
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    Reset Data Pemilih
                                </div>
                                <div class="card-body">
                                    <p class="text-bold">Fitur Hapus Semua Data</p>
                                    <p>Fitur ini digunakan apabila telah selesai melakukan pemilihan dan telah mengunduh
                                        Daftar Hadir dan Laporan Pemilihan dan ingin melakukan pemilihan di tahun
                                        berikutnya.</p>
                                    <button type="button" data-toggle="modal" data-target="#resetall" class="tmb tmb-danger"><em class="fas fa-trash-alt"></em> Reset Semua Data</button>

                                    <!-- modal reset -->
                                    <div class="modal fade" id="resetall" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Semua Data Pemilihan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda Yakin Ingin Menghapus Semua Data Termasuk ? </p>
                                                <p>1. Data Mahasiswa</p>
                                                <p>2. Data Dosen</p>
                                                <p>3. Data Kandidat Ketua Dan Wakil BEM</p>
                                                <p>4. Hasil Suara</p>
                                                <p>5. Data Kelas</p>
                                                <form action="../proses/reset/all_data.php" method="post">
                                                <div class="text-center">
                                                    <button type="submit" name="reset" class="tmb tmb-success">Ya</button>
                                                    <button type="button" class="tmb tmb-danger" data-dismiss="modal">Tidak</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal reset -->
                                </div>
                            </div>
                        </div>
                        <!-- sale 2 card end -->
                    </div>
                    <!-- [ page content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>