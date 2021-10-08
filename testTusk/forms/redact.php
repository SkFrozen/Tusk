<? include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
session_start();
$query = "SELECT * FROM `todos_bd` WHERE `ID` =" . $_POST['userID'];
$result = mysqli_query($link, $query);
$data = mysqli_fetch_assoc($result);
if ($_SESSION['login']) {
?>
	<form action=" /validation/redactOnBD.php" method="post">
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Редактирование</h4>
			</div>
			<div class="card-body">
				<ul class="list-unstyled mt-3 mb-4">
					<li>Текст: <textarea name="tuskText"><? echo $data['Text'] ?></textarea></li>
					<input hidden name="userID" value="<? echo $data['ID'] ?>">
				</ul>
				<button type="submit" class="btn btn-lg btn-block btn-outline-primary">Сохранить</button>
			</div>
		</div>
	</form>
<?
} else {
	header('Location: /forms/logIn.php');
} ?>