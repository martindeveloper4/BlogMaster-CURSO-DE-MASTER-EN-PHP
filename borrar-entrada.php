<?php 
	require_once 'includes/conexion.php';

	if (isset($_SESSION['usuario'])) {
			$entrada_id=$_GET['identradas'];
			$usuario_id=$_SESSION['usuario']['idusuarios'];

			$sql="DELETE FROM entradas WHERE usuario_id= $usuario_id AND identradas = $entrada_id";

			$borrar=mysqli_query($conexion,$sql);
		}	

header("Location:index.php");
 ?>