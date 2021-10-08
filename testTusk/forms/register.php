<? include($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>
<form class="" action=" /validation/regValid.php" method="post">
	<div class="card mb-4 shadow-sm">
		<div class="card-header">
			<h4 class="my-0 font-weight-normal">Регистрация</h4>
		</div>
		<div class="card-body">
			<table>
				<tr>
					<td>Логин: </td>
					<td><input name="userLogin"></input></td>
				</tr>
				<tr>
					<td>Пароль: </td>
					<td><input name="userPassword"></input></td>
				</tr>
			</table>
			<br>
			<button type="submit" class="btn btn-lg btn-block btn-outline-primary">Зарегистрироваться</button>
		</div>
	</div>
</form>