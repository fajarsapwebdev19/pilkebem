<?php
  require '../../dompdf/autoload.inc.php';
  require '../../dompdf/vendor/autoload.php';
  session_start();

  if(empty($_SESSION['login']))
  {
    $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white"><em class="fa-solid fa-circle-exclamation"></em> Not Allowed to access before login </div>';
    header('location: ../../admin/login/');
  }
  
  use Dompdf\Dompdf;
  $dompdf = new Dompdf();
  require '../../koneksi/koneksi.php';
  $no = 1;
  $database_data = mysqli_query($koneksi, "SELECT * FROM tb_kandidat ORDER BY nomor_kandidat ASC");
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Suara Pemilihan Ketua BEM Dan Wakil Ketua BEM Tahun <?= date('Y')?></title>
  <link rel="stylesheet" href="../../bootstrap/bootstrap/css/bootstrap.min.css">
  <script src="../../bootstrap/bootstrap/js/bootstrap.bundle.min.js"></script>
  <style>
    .bg-header{
      background-color: #eaeaea;
      color: #000;
    }
  </style>
</head>
<body>
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <h5 class="text-center">Hasil Suara Pemilihan Ketua BEM Dan Wakil Ketua BEM Tahun <?= date('Y') ?></h5>

      <table class="table table-striped table-sm table-bordered">
        <thead class="bg-header">
          <tr>
            <th class="text-center">Nomor Kandidat</th>
            <th class="text-center">Nama Ketua Dan Wakil Ketua</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Hasil Suara</th>
          </tr>
        </thead>
        <tbody>
        <?php
          while($data = mysqli_fetch_assoc($database_data)):
        ?>
          <tr>
            <td class="text-center"><?= $data['nomor_kandidat'] ?></td>
            <td class="text-center"><?= $data['nama_ketua'] ?> Dan <?= $data['nama_wakil'] ?></td>
            <td class="text-center"><img class="text-center justify-content-center" src="../../assets/upload/<?= $data['foto_kandidat']?>" width="270" height="180"></td>
            <td class="text-center">
              <?php
                $no = $data['nomor_kandidat'];
                $hitung = mysqli_query($koneksi, "SELECT * FROM view_pemilihan WHERE no_kandidat='$no'");
                $jumlah_suara = mysqli_num_rows($hitung);
                echo $jumlah_suara;
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
$title = "Hasil Suara Pemilihan Ketua BEM Dan Wakil Ketua BEM Tahun";
$date = date('Y');
$dompdf->stream($title.' Tahun '.$date.'.pdf', array("Attachment"=>0));
?>