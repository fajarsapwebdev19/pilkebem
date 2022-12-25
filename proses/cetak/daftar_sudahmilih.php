<?php
  require '../../dompdf/autoload.inc.php';
  require '../../dompdf/vendor/autoload.php';
  session_start();
  ob_start();

  if(empty($_SESSION['login']))
  {
    $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white"><em class="fa-solid fa-circle-exclamation"></em> Not Allowed to access before login </div>';
    header('location: ../../admin/login/');
  }
  use Dompdf\Dompdf;
  $dompdf = new Dompdf();
  require '../../koneksi/koneksi.php';
  $no = 1;
  $database_data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE status_memilih='Sudah' UNION SELECT * FROM dosen WHERE status_memilih='Sudah' ORDER BY nama ASC");
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Daftar Peserta Sudah Memilih Pemilihan Ketua BEM Tahun <?= date('Y') ?></title>
  <link rel="stylesheet" href="../../bootstrap/bootstrap/css/bootstrap.min.css">
  <script src="../../bootstrap/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="row">
    
    <div class="col-sm-12 col-md-12">
      <h4 class="text-center">Daftar Peserta Sudah Memilih Pemilihan Ketua BEM Tahun <?= date('Y') ?></h4>

      <table class="table table-bordered table-sm">
        <thead>
          <tr class="bg-dark text-white">
            <th class="text-center">No</th>
            <th class="text-center">NISN / Nama Dosen</th>
            <th class="text-center">Nama Peserta</th>
            <th class="text-center">JK</th>
            <th class="text-center">Kelas / Kepegawaian</th>
          </tr>
        </thead>
        <tbody>
          <?php
            
            while($data = mysqli_fetch_assoc($database_data)):
          ?>
            <tr>
              <td class="text-center"><?= $no++; ?></td>
              <td class="text-center"><?= $data['username'] ?></td>
              <td><?= $data['nama'] ?></td>
              <td class="text-center"><?= $data['jenis_kelamin']?></td>
              <td class="text-center">
                <?php
                  if($data['level'] == "Mahasiswa")
                  {
                    echo $data['kelas'];
                  }elseif($data['level'] == "Dosen")
                  {
                    echo "Dosen Dan Tenaga Pendidik";
                  }
                ?>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4','potrait');
$dompdf->render();
$title = "Daftar Peserta Sudah Memilih Pemilihan Ketua BEM";
$date = date('Y');
$dompdf->stream($title.' Tahun '.$date.'.pdf', array("Attachment"=>0));
?>



