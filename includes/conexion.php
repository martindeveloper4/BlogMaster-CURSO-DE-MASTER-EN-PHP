<?php 
	
	//$conexion=mysqli_connect($host,$user,$password,$database,$port,$socket);
	

	$conexion=mysqli_connect("localhost","root","root","bdblog");

	//comprobar si la conexion es correcta
	//mysqli_connect_errno() detecta el error de la conexion
	if(mysqli_connect_errno()){
		echo "La conexion a la base de datos no se ha producido ".mysqli_connect_error();
	}else{
		
	}

	mysqli_query($conexion,"SET NAMES 'utf8' ");

	if(!isset($_SESSION)){
		session_start();
	}

 ?>