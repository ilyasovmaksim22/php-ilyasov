<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<?php
 // Подключение к базе данных:
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("Невозможно подключиться к серверу");
 mysqli_query($conn, "SET NAMES cp1251"); // Тип кодировки
 // Строка запроса на добавление записи в таблицу:
 $sql_add = "INSERT INTO planet SET name='" . $_GET['name']
."', galaxy='".$_GET['galaxy']."', distance='"
.$_GET['distance']."', type='".$_GET['type'].
"', diam='".$_GET['diam']. "'";
 mysqli_query($conn, $sql_add); // Выполнение запроса
 if (mysqli_affected_rows($conn)>0) // если нет ошибок при выполнении запроса
 { print "<p>Запись сохранена.";
 print "<p><a href=\"index.php\"> Вернуться </a>"; }
 else { print "Ошибка сохранения. <a href=\"index.php\">
Вернуться </a>"; }
?>