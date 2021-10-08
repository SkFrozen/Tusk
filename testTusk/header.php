<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title></title>
</head>
<?php
require_once "connect_mysql.php";
session_start();
?>

<body>
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
		<h5 class="my-0 mr-md-auto font-weight-normal"><a href=" /" style="text-decoration:none; color:black;">Test</a></h5>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 text-dark" href=" /forms/CreateTusk.php">Создать задачу</a>
			<? if (!$_SESSION['login']) { ?>
				<a class="btn btn-outline-primary" href="/forms/register.php">Регистрация</a>
			<? } ?>
		</nav>
		<?
		if ($_SESSION['login']) { ?>
			<a class="btn btn-outline-primary" href=" /validation/logOut.php">Выйти</a>
		<? } else { ?>
			<a class="btn btn-outline-primary" href=" /forms/logIn.php">Войти</a>
		<? } ?>
	</div>