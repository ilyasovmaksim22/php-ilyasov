<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<?php
session_start();
if(!$_SESSION["rule"]) header("Location: .");
?>

<html><body>
<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b7cf324568026c","90ce335c", "heroku_666d3fc091d73be") or die ("���������� ������������ � �������");
 mysqli_query($conn, 'SET NAMES cp1251');
 $zapros="UPDATE app SET id_pl='".$_GET['id_pl']. "', id_developer='".$_GET['id_developer'].
"', date='".$_GET['date']."', ver='".$_GET['ver']."', name='".$_GET['name']."' WHERE id=".$_GET['id'];
 mysqli_query($conn, $zapros);
if (mysqli_affected_rows($conn)>0) {
 echo '��� ���������. <a href="index.php"> ��������� </a>'; }
 else { echo '������ ����������. <a href="index.php">
���������</a> '; }
?>
</body></html>