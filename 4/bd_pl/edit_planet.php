<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<head>
<title> Редактирование данных </title>
</head>
<body>
<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("Невозможно подключиться к серверу");
 mysqli_query($conn, 'SET NAMES cp1251');
 $rows=mysqli_query($conn, "SELECT * FROM planet WHERE id='".$_GET['id']."'");
 while ($st = mysqli_fetch_array($rows)) {
 $id=$st['id'];
 $name=$st['name'];
 $galaxy = $st['galaxy'];
 $distance = $st['distance'];
 $type = $st['type'];
 $diam = $st['diam'];
 }
print "<form action='save_edit_planet.php' metod='get'>";
print "Название: <input name='name' size='20' type='text'
value='".$name."'>";
print "<br>Созвездие: <input name='galaxy' size='20' type='text'
value='".$galaxy."'>";
print "<br>Расстояние, млн. км.: <input name='distance' size='10' type='text'
value='".$distance."'>";
print "<br>Тип: <input name='type' size='20' type='text'
value='".$type."'>";
print "<br>Диаметр, км.: <input name='diam' size='10' type='text'
value='".$diam."'>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться </a>";
?>
</body>
</html>