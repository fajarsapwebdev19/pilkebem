<?php
  session_start();
  require '../../vendor/autoload.php';
  require '../../koneksi/koneksi.php';
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Reader\Csv;
  use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

  $ektension = array('xlsx');
  $ex = pathinfo($_FILES['file_excel']['name'], PATHINFO_EXTENSION);
     
  $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

  if(isset($_POST['import']))
  {
    // validasi jika file kosong
    if(empty($_FILES['file_excel']['name']))
    {
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-error"><em class="fas fa-times-circle"></em> Gagal File Tidak Ada</div>';
      header('location: ../../admin/?page=data_mahasiswa');
    }
    else
    {
      // validasi jika file extensinya tidak sesuai
      if(!in_array($ex,$ektension))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-error"><em class="fas fa-times-circle"></em> Gagal Ektensi Hanya Xlsx</div>';
      header('location: ../../admin/?page=data_mahasiswa');
      }else{
        if(isset($_FILES['file_excel']['name']) && in_array($_FILES['file_excel']['type'], $file_mimes)) 
        {
     
      
          $arr_file = explode('.', $_FILES['file_excel']['name']);
          $extension = end($arr_file);
          
          if('csv' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
          } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
          }
          
          $spreadsheet = $reader->load($_FILES['file_excel']['tmp_name']);
              
          $sheetData = $spreadsheet->getActiveSheet()->toArray();
          for($i = 1;$i < count($sheetData);$i++)
          {
              $nama = $sheetData[$i]['0'];
              $jenis_kelamin = $sheetData[$i]['1'];
              $kelas = $sheetData[$i]['2'];
              $username = $sheetData[$i]['3'];
              $password = $sheetData[$i]['4'];
              $kehadiran = "Tidak Hadir";
              $status_memilih = "Belum";
              $status_akun = "Y";
              $level = "Mahasiswa";
              
              $import = mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES(NULL, '$nama','$jenis_kelamin','$kelas','$username','$password','$kehadiran','$status_memilih','$status_akun','$level')");
          }
        }

          if($import)
          {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Berhasil Import Data </div>';
          header('location: ../../admin/?page=data_mahasiswa');
          } 
      }
    }
  }
?>