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
<body>
<?php
	//Conectamos a la db
		
?>
<?php
	echo"<nav>";
		echo"<ul>";
			echo"<li class='lihorizontal'>";
				echo"<img class='imgusuario' src='https://evarejo.com/wp-content/uploads/2017/08/evarejo_homem_padrao.png'>";
				print_r($_SESSION["Name"]);
			echo"</li>";
			echo"<li class='liimglogout'>";
?>
				<a href='vistainicialP2.php?exituser=true'>
<?php
				echo"<img class='imglogout' src='http://www.esiam.mx/imagenes/iconos/logout%20-%20copia.png'>";
?>
				</a>
<?php
			echo"</li>";
		echo"</ul>";
	echo"</nav>";
?>

<?php
	function destroySession(){
		session_destroy();
		header("Location: login.php");
	}
	if(isset($_GET['exituser'])){
		destroySession();
	}
?>

	<?php
	print_r($_SESSION["Name"]);
	print_r($_SESSION["Pass"]);
	?>
</body>
</html>




