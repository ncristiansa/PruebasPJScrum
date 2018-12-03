<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estiloScrum.css">
	<title>Inicia Sesión</title>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>

<?php 
echo "<h2 class='titulo'>LOGIN</h2>";
	echo "<form class='formulario' action='login.php' method='POST' >";
		echo "Usuario: <br>";
			echo "<input type='text' name='nom'><br>";
		echo "Password: <br>";
			echo "<input type='password' name='password'><br>";
		echo "<input type='submit' value='Enviar' name='submit'><br>";
	echo "</form>";
	
	$nombre=$_POST["nom"];
	$pass=$_POST["password"];
?>
<?php 

	$log="mysql:host=localhost;dbname=DBPrueba";
	$conn = new PDO($log,"root","funky");
	$stmt = $conn->prepare("SELECT * FROM Users WHERE nickname=:nombre and passwd=SHA2(:pass,512)");
	$stmt->bindValue(':nombre',$nombre);
	$stmt->bindValue(':pass',$pass);
	$stmt->execute();
	$result=$stmt->rowCount();

if(isset($_POST['submit'])){
	if ($result==1) {
		//Grupo A Scrum Master
		$stmtGroupsA = $conn->prepare("SELECT nameGroup, nickname FROM Users WHERE nickname=:nombre AND nameGroup='A'");
		$stmtGroupsA->bindValue(':nombre', $nombre);
		$stmtGroupsA->execute();
		$resultGroupA=$stmtGroupsA->rowCount();
		
		//Grupo B Product Owner
		$stmtGroupsB = $conn->prepare("SELECT nameGroup, nickname FROM Users WHERE nickname=:nombre AND nameGroup='B'");
		$stmtGroupsB->bindValue(':nombre', $nombre);
		$stmtGroupsB->execute();
		$resultGroupB=$stmtGroupsB->rowCount();

		//Grupo C Developer
		$stmtGroupsC = $conn->prepare("SELECT nameGroup, nickname FROM Users WHERE nickname=:nombre AND nameGroup='C'");
		$stmtGroupsC->bindValue(':nombre', $nombre);
		$stmtGroupsC->execute();
		$resultGroupC=$stmtGroupsC->rowCount();

		if($resultGroupA==1){
			header("Location: scrummaster.html");
		}elseif ($resultGroupB==1) {
			header("Location: productowner.html");
		}elseif ($resultGroupC==1) {
			header("Location: developer.html");
		}
		
		
	}else{
		echo"No existe";
	}
}


?>
</body>
</html>