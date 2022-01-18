<?php
  $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("Невозможно подключиться к серверу");
  mysqli_query($conn, "SET NAMES cp1251");

  define('FPDF_FONTPATH',"../../fpdf/font/");
  require("../../fpdf/fpdf.php");
  
  $pdf = new FPDF();
  $pdf -> AddPage();

  $pdf -> AddFont("Arial", "", "arial.php");
  $pdf -> SetFont("Arial", "", "18");

  $pdf -> Cell(175, 10, "Зарегистрированное население", 1, 1, "C");
 
  $pdf -> AddFont("Arial", "", "arial.php");
  $pdf -> SetFont("Arial", "", "6");

  $pdf -> Cell(5, 5, "№", 1, 0, "C");
  $pdf -> Cell(25, 5, "Планета", 1, 0, "C");
  $pdf -> Cell(25, 5, "Созвездие", 1, 0, "C");
  $pdf -> Cell(25, 5, "Расстояние, млн. км.", 1, 0, "C");
  $pdf -> Cell(20, 5, "Тип", 1, 0, "C");
  $pdf -> Cell(25, 5, "Диаметр, км.", 1, 0, "C");
  $pdf -> Cell(25, 5, "Вид инопланетян", 1, 0, "C");
  $pdf -> Cell(25, 5, "Количество, тыс.", 1, 1, "C");

  $pdf -> SetFont("Arial", "", "5");

  $query = mysqli_query($conn, "SELECT * FROM population");
  for($i = 1; $fetch_request = mysqli_fetch_array($query); $i++) {
    $id_planet = $fetch_request["id_planet"];
    $id_alien = $fetch_request["id_alien"];
    $count = $fetch_request["count"];

    $query_fridge = mysqli_query($conn, "SELECT * FROM planet WHERE id = '" . $id_planet . "'");
    if($fetch_fridge = mysqli_fetch_array($query_fridge)) {
      $name_planet = $fetch_fridge["name"];
      $galaxy = $fetch_fridge["galaxy"];
      $distance = $fetch_fridge["distance"];
      $type = $fetch_fridge["type"];
      $diam = $fetch_fridge["diam"];
    }
   
    $query_service = mysqli_query($conn, "SELECT * FROM alien WHERE id = '" . $id_alien . "'");
    if($fetch_service = mysqli_fetch_array($query_service)) {
      $name_alien = $fetch_service["name"];
    }

    $pdf -> Cell(5, 5, $i, 1, 0, "C");
    $pdf -> Cell(25, 5, $name_planet, 1, 0, "C");
    $pdf -> Cell(25, 5, $galaxy, 1, 0, "C");
    $pdf -> Cell(25, 5, $distance, 1, 0, "C");
    $pdf -> Cell(20, 5, $type, 1, 0, "C");
    $pdf -> Cell(25, 5, $diam, 1, 0, "C");
    $pdf -> Cell(25, 5, $name_alien, 1, 0, "C");
    $pdf -> Cell(25, 5, $count, 1, 1, "C");
}

$pdf -> Output("katasonov_12.pdf", "D");
?>