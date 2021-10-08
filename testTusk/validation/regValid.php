<?php
require_once "../header.php";
$loginUser = $_POST['userLogin'];
$passUser = $_POST['userPassword'];
if (strlen($loginUser) === 0 || strlen($passUser) === 0) {
	echo "Поля не могут быть пустыми";
	exit();
}
$query = "SELECT * FROM `todos_bd` WHERE `login` = '$userLogin' AND `password` = '$userPassword'";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($result);
foreach ($data as $user) {
	if ($loginUser === $user['login']) {
		echo 'Такой пользователь уже существует';
		exit();
	}
}
$result = mysqli_query($link, "INSERT INTO `todos_bd` (`login`, `password`) VALUES ('$loginUser', '$passUser')");
//Комментарий