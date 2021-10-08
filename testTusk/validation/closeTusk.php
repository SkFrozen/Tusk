<? include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
session_start();
$_SESSION['tusk'] = 'open';
if ($_SESSION['tusk'] === 'open') {
	$query = "UPDATE todos_bd SET Status = 'Закрыта' WHERE ID = " . $_POST['userID'];
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	header('Location: /?tusk=close');
	$_SESSION['tusk'] = 'close';
} else {
	header('Location: /forms/logIn.php');
}
