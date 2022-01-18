<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<head> <title> Добавление новой записи </title> </head>
<body>
<H2>Добавление новой записи:</H2>
<form action="save_new_planet.php" metod="get">
<br>Название: <input name="name" size="20" type="text">
<br>Созвездие: <input name="galaxy" size="20" type="text">
<br>Расстояние, млн. км.: <input name="distance" size="10" type="text">
<br>Тип: <input name="type" size="20" type="text">
<br>Диаметр, км.: <input name="diam" size="10" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p><a href="index.php"> Вернуться </a>
</body>
</html>