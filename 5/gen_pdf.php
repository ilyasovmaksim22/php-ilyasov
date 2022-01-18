<?php
session_start();
if(!$_SESSION["rule"]) header("Location: .");
?>

<?php
  $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b7cf324568026c","90ce335c", "heroku_666d3fc091d73be") or die ("���������� ������������ � �������");
  mysqli_query($conn, "SET NAMES cp1251");

  define('FPDF_FONTPATH',"../fpdf/font/");
  require("../fpdf/fpdf.php");
  
  $pdf = new FPDF();
  $pdf -> AddPage();

  $pdf -> AddFont("Arial", "", "arial.php");
  $pdf -> SetFont("Arial", "", "18");

  $pdf -> Cell(185, 10, "����������", 1, 1, "C");
 
  $pdf -> AddFont("Arial", "", "arial.php");
  $pdf -> SetFont("Arial", "", "6");

  $pdf -> Cell(5, 5, "�", 1, 0, "C");
  $pdf -> Cell(30, 5, "�������� ����������", 1, 0, "C");
  $pdf -> Cell(30, 5, "������� ������", 1, 0, "C");
  $pdf -> Cell(30, 5, "�������� ������������", 1, 0, "C");
  $pdf -> Cell(30, 5, "�����", 1, 0, "C");
  $pdf -> Cell(30, 5, "��� ����������", 1, 0, "C");
  $pdf -> Cell(30, 5, "��� (����. / �����.)", 1, 1, "C");

  $pdf -> SetFont("Arial", "", "5");

  $query_app = mysqli_query($conn, "SELECT * FROM app");
  for($i = 1; $fetch_app = mysqli_fetch_array($query_app); $i++) {
    $name_app = $fetch_app["name"];
    $ver = $fetch_app["ver"];
    $id_pl = $fetch_app["id_pl"];
    $id_developer = $fetch_app["id_developer"];

    $query_developer = mysqli_query($conn, "SELECT * FROM developer WHERE id = '" . $id_developer . "'");
    if($fetch_developer = mysqli_fetch_array($query_developer)) {
      $name_developer = $fetch_developer["name"];
      $city = $fetch_developer["city"];
    }
   
    $query_pl = mysqli_query($conn, "SELECT * FROM pl WHERE id = '" . $id_pl . "'");
    if($fetch_pl = mysqli_fetch_array($query_pl)) {
      $name_pl = $fetch_pl["name"];
      $exec = $fetch_pl["exec"];
      $type = $fetch_pl["type"];
    }

    $pdf -> Cell(5, 5, $i, 1, 0, "C");
    $pdf -> Cell(30, 5, $name_app, 1, 0, "C");
    $pdf -> Cell(30, 5, $ver, 1, 0, "C");
    $pdf -> Cell(30, 5, $name_developer, 1, 0, "C");
    $pdf -> Cell(30, 5, $city, 1, 0, "C");
    $pdf -> Cell(30, 5, $exec, 1, 0, "C");
    $pdf -> Cell(30, 5, $type, 1, 1, "C");
}

$pdf -> Output("ilyasov_11.pdf", "D");
?>