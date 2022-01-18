<?php
  header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
  header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
  header("Content-Disposition: attachment; filename=katasonov_12.xlsx");

  require "../../vendor/autoload.php";

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("Невозможно подключиться к серверу");
  mysqli_query($conn, "SET NAMES utf8");

  $spreadsheet = new Spreadsheet();
  
  $sheet = $spreadsheet -> getActiveSheet();

  $sheet -> setTitle("Зарегистрированное население");

  $sheet -> SetCellValue("A1", "Зарегистрированное население");
  $sheet -> mergeCells("A1:H1");
  $sheet -> getStyle("A1:H1") -> getAlignment() -> setHorizontal("center");

  $sheet -> getColumnDimension("A") -> setWidth(5);
  $sheet -> getColumnDimension("B") -> setWidth(20);
  $sheet -> getColumnDimension("C") -> setWidth(20);
  $sheet -> getColumnDimension("D") -> setWidth(25);
  $sheet -> getColumnDimension("E") -> setWidth(20);
  $sheet -> getColumnDimension("F") -> setWidth(20);
  $sheet -> getColumnDimension("G") -> setWidth(30);
  $sheet -> getColumnDimension("H") -> setWidth(25);

  $sheet -> SetCellValue("A2", "№");
  $sheet -> SetCellValue("B2", "Планета");
  $sheet -> SetCellValue("C2", "Созвездие");
  $sheet -> SetCellValue("D2", "Расстояние, млн. км.");
  $sheet -> SetCellValue("E2", "Тип");
  $sheet -> SetCellValue("F2", "Диаметр, км.");
  $sheet -> SetCellValue("G2", "Вид инопланетян");
  $sheet -> SetCellValue("H2", "Количество, тыс.");

  $query = mysqli_query($conn, "SELECT * FROM population");
  for($i = 1; $fetch_population = mysqli_fetch_array($query); $i++) {
    $id_planet = $fetch_population["id_planet"];
    $id_alien = $fetch_population["id_alien"];
    $count = $fetch_population["count"];

    $query_planet = mysqli_query($conn, "SELECT * FROM planet WHERE id = '" . $id_planet . "'");
    if($fetch_planet = mysqli_fetch_array($query_planet)) {
      $name_planet = $fetch_planet["name"];
      $galaxy = $fetch_planet["galaxy"];
      $distance = $fetch_planet["distance"];
      $type = $fetch_planet["type"];
      $diam = $fetch_planet["diam"];
    }
   
    $query_alien = mysqli_query($conn, "SELECT * FROM alien WHERE id = '" . $id_alien . "'");
    if($fetch_alien = mysqli_fetch_array($query_alien)) {
      $name_alien = $fetch_alien["name"];
    }

    $sheet -> SetCellValue("A".($i+2), $i);
    $sheet -> SetCellValue("B".($i+2), $name_planet);
    $sheet -> SetCellValue("C".($i+2), $galaxy);
    $sheet -> SetCellValue("D".($i+2), $distance);
    $sheet -> SetCellValue("E".($i+2), $type);
    $sheet -> SetCellValue("F".($i+2), $diam);
    $sheet -> SetCellValue("G".($i+2), $name_alien);
    $sheet -> SetCellValue("H".($i+2), $count);
  }

  $writer = new Xlsx($spreadsheet);
  $writer -> save("php://output");

  exit();
  
?>
