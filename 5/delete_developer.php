<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b7cf324568026c","90ce335c", "heroku_666d3fc091d73be") or die ("Невозможно подключиться к серверу");
 $zapros="DELETE FROM developer WHERE id=" . $_GET['id'];
 mysqli_query($conn, $zapros);
 header("Location: index.php");
 exit;
?>