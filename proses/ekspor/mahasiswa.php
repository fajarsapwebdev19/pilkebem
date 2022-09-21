<?php
  session_start();
  if(empty($_SESSION['login']))
  {
    $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">Not Allowed to access before login</div>';
    header('location: ../../admin/login/');
  }
  require '../../vendor/autoload.php';
  require '../../koneksi/koneksi.php';
  use PhpOffice\PhpSpreadsheet\Helper\Sample;
  use PhpOffice\PhpSpreadsheet\IOFactory;
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();

  // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
  $style_col = [
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ],
    'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
    ]
  ];
 
  // Set document properties
  $spreadsheet->getProperties()->setCreator('Pilkebem')
  ->setLastModifiedBy('Aplication Pilkebem by Fajar Saputra')
  ->setTitle('Pilkebem Data Mahasiswa')
  ->setSubject('Data Mahasiswa')
  ->setDescription('Data Mahasiswa Pilkebem')
  ->setKeywords('Mhs')
  ->setCategory('Data Mahasiswa');

  //Font Color
  $spreadsheet->getActiveSheet()->getStyle('A1:E1')
      ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
  
  // Background color
      $spreadsheet->getActiveSheet()->getStyle('A1:E1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('0000CCFF');
  
  
  // Header Tabel
  $spreadsheet->setActiveSheetIndex(0)
  ->setCellValue('A1', 'Nama Mahasiswa')
  ->setCellValue('B1', 'Jenis Kelamin')
  ->setCellValue('C1', 'Kelas')
  ->setCellValue('D1', 'Username')
  ->setCellValue('E1', 'Password');


  // Apply style header yang telah kita buat tadi ke masing-masing kolom header
  $sheet->getStyle('A1')->applyFromArray($style_col);
  $sheet->getStyle('B1')->applyFromArray($style_col);
  $sheet->getStyle('C1')->applyFromArray($style_col);
  $sheet->getStyle('D1')->applyFromArray($style_col);
  $sheet->getStyle('E1')->applyFromArray($style_col);

  // Set width kolom
  $sheet->getColumnDimension('A')->setWidth(30); // Set width kolom A
  $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
  $sheet->getColumnDimension('C')->setWidth(30); // Set width kolom C
  $sheet->getColumnDimension('D')->setWidth(30); // Set width kolom D
  $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E

  
  $i=2; 
  $no=1; 
  $query = "SELECT * FROM mahasiswa ORDER BY kelas ASC,nama ASC";
  $dewan1 = $koneksi->prepare($query);
  $dewan1->execute();
  $res1 = $dewan1->get_result();
  while ($row = $res1->fetch_assoc()) {
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A'.$i, $row['nama'])
    ->setCellValue('B'.$i, $row['jenis_kelamin'])
    ->setCellValue('C'.$i, $row['kelas'])
    ->setCellValue('D'.$i, $row['username'])
    ->setCellValue('E'.$i, $row['password']);
    $i++;
  }
  
  
  // Rename worksheet
  $spreadsheet->getActiveSheet()->setTitle('Data Mahasiswa '.date('d-m-Y H'));
  
  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
  $spreadsheet->setActiveSheetIndex(0);
  
  // Redirect output to a client’s web browser (Xlsx)
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="Data Mahasiswa.xlsx"');
  header('Cache-Control: max-age=0');
  // If you're serving to IE 9, then the following may be needed
  header('Cache-Control: max-age=1');
  
  // If you're serving to IE over SSL, then the following may be needed
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
  header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
  header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
  header('Pragma: public'); // HTTP/1.0
  
  $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
  $writer->save('php://output');
  
?>