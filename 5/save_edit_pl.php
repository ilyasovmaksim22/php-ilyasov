<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html><body>
<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b7cf324568026c","90ce335c", "heroku_666d3fc091d73be") or die ("Невозможно подключиться к серверу");
 mysqli_query($conn , 'SET NAMES cp1251');
 $zapros="UPDATE pl SET name='".$_GET['name'].
"', type='".$_GET['type']."', year='"
.$_GET['year']."', exec='".$_GET['exec'].
"', dev='".$_GET['dev']."' WHERE id='"
.$_GET['id']."'";
 mysqli_query($conn, $zapros);
if (mysqli_affected_rows($conn)>0) {
 echo 'Все сохранено. <a href="index.php"> Вернуться </a>'; }
 else { echo 'Ошибка сохранения. <a href="index.php">
Вернуться</a> '; }
?>
</body></html>