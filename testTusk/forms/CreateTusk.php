<? include($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>
<form class="" action=" /validation/AddTuskOnBD.php" method="post">
	<div class="card mb-4 shadow-sm">
		<div class="card-header">
			<h4 class="my-0 font-weight-normal">Создание новой задачи</h4>
		</div>
		<div class="card-body">
			<table>
				<tr>
					<td>Имя: </td>
					<td><input name="userName"></input></td>
				</tr>
				<tr>
					<td>Email: </td>
					<td><input name="userEmail"></input></td>
				</tr>
				<tr>
					<td>Текст: </td>
					<td><input name="tuskText"></input></td>
				</tr>
			</table>
			<br>
			<button type="submit" class="btn btn-lg btn-block btn-outline-primary">Создать</button>
		</div>
		<? if ($_GET['tusk'] == 'errorInput') {
			echo "<p style='color:red;'>Поля не могут быть пустые</p>";
		}
		if ($_GET['tusk'] == 'errorEmail') {
			echo "<p style='color:red;'>Email введен неверно</p>";
		}
		if ($_GET['tusk'] == 'errorText') {
			echo "<p style='color:red;'>Не больше 500 символов в поле Текст</p>";
		}
		if ($_GET['tusk'] == 'errorName') {
			echo "<p style='color:red;'>Не больше 30 символов в поле Имя</p>";
		}
		?>
	</div>
</form>
<? include($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>