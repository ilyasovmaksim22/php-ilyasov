<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<head>
<title> �������������� ������ </title>
</head>
<body>
<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b7cf324568026c","90ce335c", "heroku_666d3fc091d73be") or die ("���������� ������������ � �������");
 mysqli_query($conn, 'SET NAMES cp1251');
 $rows=mysqli_query($conn, "SELECT * FROM app WHERE id=".$_GET['id']);
 while ($st = mysqli_fetch_array($rows)) {
 $id_pl=$st["id_pl"];
 $id_developer=$st["id_developer"];
 $date=$st["date"];
 $ver=$st["ver"];
 $name=$st["name"];
 }

print "<form action='save_edit_app.php' metod='get'>";
print "id ����� ����������������: <select name='id_pl'>";

print "<br>id ����� ����������������: <select name='id_pl'>";
$result=mysqli_query($conn, "SELECT * FROM pl");
foreach($result as $row) {
  if($row["id"] == $id_pl) echo "<option value='".$row["id"]."' selected>".$row["name"]."</option>";
  else echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
  }
echo "</select>";

print "<br>id ������������: <select name='id_developer'>";
$result=mysqli_query($conn, "SELECT * FROM developer");
foreach($result as $row) {
  if($row["id"] == $id_developer) echo "<option value='".$row["id"]."' selected>".$row["name"]."</option>";
  else echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
  }
echo "</select>";

print "<br>���� ��������: <input name='date' type='date'
value='".$date."'>";
print "<br>������� ������: <input name='ver' size='20' type='text'
value='".$ver."'>";
print "<br>��������: <input name='name' size='20' type='text'
value='".$name."'>";
print "<input type='hidden' name='id' value='".$_GET['id']."'>";
print "<input type='submit' name='' value='���������'>";
print "</form>";
print "<p><a href=\"index.php\"> ��������� </a>";
?>
</body>
</html>