<?
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
if ($_SESSION['login']) {
	echo "<p style='color:green;'>Вы авторизованны</p>";
}
if ($_GET['tusk'] == "add") {
	echo "<p style='color:green;'>Задача добавлена</p>";
}
if ($_SESSION['tusk'] === "close") {
	echo "<p style='color:green;'>Задача закрыта</p>";
	$_SESSION['tusk'] = '';
}
if ($_GET['tusk'] == "redact") {
	echo "<p style='color:green;'>Задача изменена</p>";
}
?>
Сортировать по:
<a href="?orderColum=Name">Имени</a>
<a href="?orderColum=Email">Email</a>
<a href="?orderColum=Status">Статусу</a><br>
Сортировка по:
<a href="?order=ASC&orderColum=<? echo $_GET['orderColum'] ?>&page=<? echo $_GET['page'] ?>">Возрстанию</a>
<a href="?order=DESC&orderColum=<? echo $_GET['orderColum'] ?>&page=<? echo $_GET['page'] ?>">Убыванию</a>
<? foreach ($data as $user) { ?>
	<div class="card mb-4 shadow-sm">
		<div class="card-header">
			<h4 class="my-0 font-weight-normal"><? echo $user["Name"]; ?></h4>
			<? if ($user['redact'])
				echo "<p style='color:grey;'>Отредактированно модератором</p>"
			?>
		</div>
		<div class="card-body">
			<ul class="list-unstyled mt-3 mb-4">
				<li>Статус : <? echo $user["Status"]; ?></li>
				<br>
				<li><? echo $user["Text"]; ?></li>
				<br>
				<li>Email: <? echo $user["Email"]; ?></li>
			</ul>
			<? if ($_SESSION['login']) { ?>
				<form action=" /forms/redact.php" method="post">
					<input hidden name="userID" value="<? echo $user['ID']; ?>">
					<button type="submit" class="btn btn-lg btn-block btn-outline-primary">Редактировать</button><br>
				</form>
				<form action=" /validation/closeTusk.php" method="post">
					<input hidden name="userID" value="<? echo $user['ID']; ?>">
					<? if (!($user['Status'] === 'Закрыта')) { ?>
						<button type="submit" class="btn btn-lg btn-block btn-outline-primary">Закрыть задачу</button>
					<? } ?>
				</form>
			<?php } ?>
		</div>
	</div>
<? } ?>
<div class="pagenation" style="text-align: center;">
	<? for ($i = 0; $i < $countPage; $i++) {
		echo ("<a href='?page=" . ($i + 1) . "&order=" . $_GET['order'] . "&orderColum=" . $_GET['orderColum'] . "'>" . ($i + 1) . "</a>");
	} ?>
</div>
<? include($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); //Комментарий 
//Второй комментарий
?>