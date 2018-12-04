<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo2.css">
	<title>Prueba 2</title>
	<meta charset="utf-8">
</head>
<?php
	function destroySession(){
		session_destroy();
		header("Location: login.php");
	}
	if(isset($_GET['exituser'])){
		destroySession();
	}
?>
<body>
	<nav>
		<ul>
			<li class="logout"><a href='vistainicialP2.php?exituser=true'><img src="img-icon/logout2.png" " height="30px" width="30px"></a></li>
			<li>User: UserName</li>
			
		</ul>
	</nav>
</body>
</html>


