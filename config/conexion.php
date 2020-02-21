<?php 
	
	//$conexion=mysqli_connect($host,$user,$password,$database,$port,$socket);
	
	/*
	$conexion=mysqli_connect("localhost","root","root","bdblog");

	//comprobar si la conexion es correcta

	if(mysqli_connect_errno()){
		echo "La conexion a la base de datos no se ha producido ".mysqli_connect_error();
	}else{
		echo "Conexion realizada correctamente"."<br/>";

		mysqli_query($conexion,"SET NAMES 'utf8' ");
	}
	*/

	//consulta para configurar la codificacion de caracteres
	//mysql_query($link,$query);

	/*
	mysqli_query($conexion,"SET NAMES 'utf8' ");

	//consulta select
	$query=mysqli_query($conexion,"SELECT * FROM nota");
	

	//recorrer la tabla
	while ($nota = mysqli_fetch_assoc($query)) {
		# code...
		//var_dump($nota);
		echo $nota['titulo'].'<br/>';
		echo $nota['descripcion'].'<br/>';
		echo $nota['color'].'<br/>';
	}



	//insertar en la base de datos
	$sql="INSERT INTO nota VALUES (null,'Buenas tardes','Nota de PHP','Green')";
	$query=mysqli_query($conexion,$sql);

	if($query){
		echo "Datos insertados correctamente";
	}else{
		echo "Error: ".mysqli_error($conexion);
	}

	*/
	

 ?>