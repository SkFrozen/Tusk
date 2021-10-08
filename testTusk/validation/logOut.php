<?include($_SERVER['DOCUMENT_ROOT']."/header.php");
session_start();
setcookie('user',$user['login'],time()-360,"/");
header("Location: /");
$_SESSION['login'] = false;
