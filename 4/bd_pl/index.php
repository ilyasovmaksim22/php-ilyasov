<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<body>
<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b7cf324568026c","90ce335c", "heroku_666d3fc091d73be") or die ("���������� ������������ � �������");
 mysqli_query($conn, "SET NAMES cp1251");
?>
<h2>����� ����������������:</h2>
<table border="1">
<tr>
 <th> id </th>
 <th> �������� </th> <th> ��� </th>
 <th> ��� ���������� </th> <th> ��� ���������� </th> <th> ����������� </th>
 <th> ������������� </th> <th> ���������� </th> </tr>
<?php
$result=mysqli_query($conn, "SELECT * FROM pl"); // ������ �� ������� �������� � �������������
while ($row=mysqli_fetch_array($result)){// ��� ������ ������ �� �������
 echo "<tr>";
 echo "<td>" . $row["id"] . "</td>";
 echo "<td>" . $row["name"] . "</td>";
 echo "<td>" . $row["type"] . "</td>";
 echo "<td>" . $row["year"] . "</td>";
 echo "<td>" . $row["exec"] . "</td>";
 echo "<td>" . $row["dev"] . "</td>";
 echo "<td><a href='edit_pl.php?id=" . $row["id"]
. "'>�������������</a></td>"; // ������ ������� ��� ��������������
 echo "<td><a href='delete_pl.php?id=" . $row["id"]
. "'>�������</a></td>"; // ������ ������� ��� �������� ������
 echo "</tr>";
}
echo "</table>";
$num_rows = mysqli_num_rows($result); // ����� ������� � ������� ��
print("<P>����� �������: $num_rows </p>");
?>
<a href="new_pl.php"> �������� ������ </a><br><br>

<h2>������������:</h2>
<table border='1''>
<tr>
 <th> id </th>
 <th> �������� </th> <th> ����� </th>
 <th> ������������� </th> <th> ���������� </th> </tr>
<?php
$result=mysqli_query($conn, "SELECT * FROM developer"); // ������ �� ������� �������� � �������������
while ($row=mysqli_fetch_array($result)){// ��� ������ ������ �� �������
 echo "<tr>";
 echo "<td>" . $row["id"] . "</td>";
 echo "<td>" . $row["name"] . "</td>";
 echo "<td>" . $row["city"] . "</td>";
 echo "<td><a href='edit_developer.php?id=" . $row["id"]
. "'>�������������</a></td>"; // ������ ������� ��� ��������������
 echo "<td><a href='delete_developer.php?id=" . $row["id"]
. "'>�������</a></td>"; // ������ ������� ��� �������� ������
 echo "</tr>";
}
echo "</table>";
$num_rows = mysqli_num_rows($result); // ����� ������� � ������� ��
print("<P>����� �������: $num_rows </p>");
?>
<a href="new_developer.php"> �������� ������ </a><br><br>

<h2>����������:</h2>
<table border='1''>
<tr>
 <th> id </th>
 <th> id ����� ���������������� </th> <th> id ������������ </th> <th> ���� �������� </th>
 <th> ������� ������ </th> <th> �������� </th>
 <th> ������������� </th> <th> ���������� </th> </tr>
<?php
$result=mysqli_query($conn, "SELECT * FROM app"); // ������ �� ������� �������� � �������������
while ($row=mysqli_fetch_array($result)){// ��� ������ ������ �� �������
 echo "<tr>";
 echo "<td>" . $row["id"] . "</td>";
 echo "<td>" . $row["id_pl"] . "</td>";
 echo "<td>" . $row["id_developer"] . "</td>";
 echo "<td>" . date("d.m.Y", strtotime($row["date"])) . "</td>";
 echo "<td>" . $row["ver"] . "</td>";
 echo "<td>" . $row["name"] . "</td>";
 echo "<td><a href='edit_app.php?id=" . $row["id"]
. "'>�������������</a></td>"; // ������ ������� ��� ��������������
 echo "<td><a href='delete_app.php?id=" . $row["id"]
. "'>�������</a></td>"; // ������ ������� ��� �������� ������
 echo "</tr>";
}
echo "</table>";
$num_rows = mysqli_num_rows($result); // ����� ������� � ������� ��
print("<P>����� �������: $num_rows </p>");
?>
<a href="new_app.php"> �������� ������ </a><br><br>

<a href="gen_pdf.php"> ��������� PDF </a><br>
<a href="gen_xls.php"> ��������� Excel </a><br>

<br><a href='..'>�����</a><br>

</body> </html>
