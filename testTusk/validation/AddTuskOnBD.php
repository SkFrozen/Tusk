<?php
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
$userName = htmlspecialchars(trim($_POST['userName']));
$userEmail = trim($_POST['userEmail']);
$tuskText = htmlspecialchars(trim($_POST['tuskText']));

if (strlen($userName) == 0 || strlen($userEmail) == 0 || strlen($tuskText) == 0) {
	header('Location: /forms/CreateTusk.php/?tusk=errorInput');
	exit();
}
if (!filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL)) {
	header('Location: /forms/CreateTusk.php/?tusk=errorEmail');
	exit();
}
if (strlen($_POST['tuskText']) > 500) {
	header('Location: /forms/CreateTusk.php/?tusk=errorText');
	exit();
}
if (strlen($_POST['userName']) > 30) {
	header('Location: /forms/CreateTusk.php/?tusk=errorUser');
	exit();
}
$query = ("INSERT INTO `todos_bd` (`Name`, `Email`, `Text`, `Status`,`redact`, `login`, `password`) VALUES ('$userName', '$userEmail', '$tuskText', 'В работе',NULL, NULL, NULL)");
if ($result = mysqli_query($link, $query)) {
	header('Location: /?tusk=add');
}
