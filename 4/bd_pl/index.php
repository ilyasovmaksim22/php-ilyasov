<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<body>
<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("Невозможно подключиться к серверу");
 mysqli_query($conn, "SET NAMES cp1251");
?>
<h2>Планеты:</h2>
<table border="1">
<tr>
 <th> id </th>
 <th> Название </th> <th> Созвездие </th>
 <th> Расстояние, млн. км. </th> <th> Тип </th> <th> Диаметр, км. </th>
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($conn, "SELECT * FROM planet"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row["id"] . "</td>";
 echo "<td>" . $row["name"] . "</td>";
 echo "<td>" . $row["galaxy"] . "</td>";
 echo "<td>" . $row["distance"] . "</td>";
 echo "<td>" . $row["type"] . "</td>";
 echo "<td>" . $row["diam"] . "</td>";
 echo "<td><a href='edit_planet.php?id=" . $row["id"]
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td><a href='delete_planet.php?id=" . $row["id"]
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
echo "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего записей: $num_rows </p>");
?>
<a href="new_planet.php"> Добавить запись </a><br><br>

<h2>Виды инопланетян:</h2>
<table border='1''>
<tr>
 <th> id </th>
 <th> Название </th> <th> Описание </th>
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($conn, "SELECT * FROM alien"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row["id"] . "</td>";
 echo "<td>" . $row["name"] . "</td>";
 echo "<td>" . $row["info"] . "</td>";
 echo "<td><a href='edit_alien.php?id=" . $row["id"]
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td><a href='delete_alien.php?id=" . $row["id"]
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
echo "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего записей: $num_rows </p>");
?>
<a href="new_alien.php"> Добавить запись </a><br><br>

<h2>Зарегистрированное население :</h2>
<table border='1''>
<tr>
 <th> id </th>
 <th> id Планеты </th> <th> id Вида инопланетян </th> <th> Количество, тыс. </th>
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($conn, "SELECT * FROM population"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row["id"] . "</td>";
 echo "<td>" . $row["id_planet"] . "</td>";
 echo "<td>" . $row["id_alien"] . "</td>";
 echo "<td>" . $row["count"] . "</td>";
 echo "<td><a href='edit_population.php?id=" . $row["id"]
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td><a href='delete_population.php?id=" . $row["id"]
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
echo "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего записей: $num_rows </p>");
?>
<a href="new_population.php"> Добавить запись </a><br><br>

<a href="gen_pdf.php"> Сохранить PDF </a><br>
<a href="gen_xls.php"> Сохранить Excel </a><br>

<br><a href='..'>Назад</a><br>

</body> </html>
