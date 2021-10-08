<?php
$link = mysqli_connect($host = 'localhost', $user = 'mysql', $password, $dbname = 'testphp') or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");
$queryCount = mysqli_query($link, "SELECT * FROM todos_bd");
$num_rows = mysqli_num_rows($queryCount);
if ($_GET['page'] < 1) {
	$_GET['page'] = 1;
}
if ($_GET['order'] == "") {
	$_GET['order'] = "ASC";
}
if ($_GET['orderColum'] == "") {
	$_GET['orderColum'] = "Name";
}
$startLimit = $_GET['page'] * 3 - 3;
$countPage = ceil($num_rows / 3);
$result = mysqli_query($link, "SELECT * FROM todos_bd ORDER BY " . $_GET['orderColum'] . " " . $_GET['order'] . " LIMIT $startLimit,3") or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
