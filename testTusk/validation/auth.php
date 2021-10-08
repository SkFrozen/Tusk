<?php
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
$userLogin = filter_var(trim($_POST['userLogin']), FILTER_SANITIZE_STRING);
$userPassword = filter_var(trim($_POST['userPassword']), FILTER_SANITIZE_STRING);


if (strlen($userLogin) == 0 || strlen($userPassword) == 0) {
	echo "<p style='color:red;'>Поля не могут быть пустыми</p>";
	exit();
}
$query = "SELECT * FROM `todos_bd` WHERE `login` = '$userLogin' AND `password` = '$userPassword'";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($result);
session_start();
$_SESSION['login'] = false;
if (count($user) < 1) {
	echo "<p style='color:red;'>Пользователь не найден</p>";
	$_SESSION['login'] = false;
} else {
	setcookie('user', $user['Login'], time() + 360, "/");
	header('Location: /?login=YES');
	$_SESSION['login'] = true;
}
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");
