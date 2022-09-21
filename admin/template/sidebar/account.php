<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Admin</div>
            <ul class="pcoded-item pcoded-left-item">
                <li>
                    <a onclick="javascript:window.location.href='./'" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="active">
                    <a onclick="javascript:window.location.href='?page=account'" class="waves-effect waves-dark" style="display: <?php if($hak_akses['manajemen_akun'] == "N"){ echo 'none;'; } ?>">
                        <span class="pcoded-micon">
                            <i class="fas fa-user icon-menu"></i>
                        </span>
                        <span class="pcoded-mtext">Manajemen Akun</span>
                    </a>
                </li>
                <li class="pcoded-hasmenu">
                    <a class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Referensi</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a onclick="javascript:window.location.href='?page=data_kelas'" class="waves-effect waves-dark" style="display: <?php if($hak_akses['data_kelas'] == "N"){ echo 'none;'; } ?>">
                                <span class="pcoded-mtext">Data Kelas</span>
                            </a>
                        </li>
                        <li class="">
                            <a onclick="javascript:window.location.href='?page=data_mahasiswa'" class="waves-effect waves-dark" style="display: <?php if($hak_akses['data_siswa'] == "N"){ echo 'none;'; } ?>">
                                <span class="pcoded-mtext">Data Mahasiswa</span>
                            </a>
                        </li>
                        <li class="">
                            <a onclick="javascript:window.location.href='?page=data_dtk'" class="waves-effect waves-dark" style="display: <?php if($hak_akses['data_gtk'] == "N"){ echo 'none;'; } ?>">
                                <span class="pcoded-mtext">Data DTK</span>
                            </a>
                        </li>
                        <li class="">
                            <a onclick="javascript:window.location.href='?page=data_kandidat'" class="waves-effect waves-dark" style="display: <?php if($hak_akses['data_kandidat'] == "N"){ echo 'none;'; } ?>">
                                <span class="pcoded-mtext">Data Kandidat</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu" <?php if($hak_akses['rekap_data'] == "N"){echo 'style="display:none"';}?>>
                    <a class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fas fa-file"></i>
                        </span>
                        <span class="pcoded-mtext">Rekap Data</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a onclick="javascript:window.location.href='?page=kehadiran'" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Kehadiran</span>
                            </a>
                        </li>
                        <li class="">
                            <a onclick="javascript:window.location.href='?page=pemilihan'" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Pemilihan</span>
                            </a>
                        </li>
                        <li class="">
                            <a onclick="javascript:window.location.href='?page=suara'" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Suara / Hasil Vote</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a onclick="javascript:window.open('../assets/user-guide/User-Guide-Admin.pdf','_blank'),reload()" class="waves-dark">
                        <span class="pcoded-micon"><i class="fas fa-download"></i></span>
                        <span class="pcoded-mtext">Panduan Pengguna</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>