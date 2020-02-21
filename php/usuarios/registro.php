<?php 

	if(isset($_POST)){
		//Recoger los valores del formulario de registro
		require_once '../../includes/conexion.php';


		// Iniciar sesión
		if(!isset($_SESSION)){
			session_start();
		}
		//mysqli_real_escape_string(), permite que se meta comillas en el input del formulario
		$nombre=isset($_POST['nombre'])? mysqli_real_escape_string($conexion, $_POST['nombre']):false;
		$apellidos=isset($_POST['apellidos'])? mysqli_real_escape_string($conexion, $_POST['apellidos']):false;
		$email=isset($_POST['email'])? mysqli_real_escape_string($conexion, trim($_POST['email'])):false;
		$password=isset($_POST['password'])? mysqli_real_escape_string($conexion, $_POST['password']):false;


		$errores = array();
		//validar los datos antes de guardarlos en la base de datos

		if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
			$nombre_validado=true;
		}else{
			$nombre_validado=false;
			$errores['nombre']="El nombre no es valido";
		}


		//validar apellidos
		if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $nombre)){
			$apellidos_validado=true;
		}else{
			$apellidos_validado=false;
			$errores['apellidos']="El apellido no es valido";
		}

		//validar el email
		if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)){
			$email_validado=true;
		}else{
			$email_validado=false;
			$errores['email']="el email no es valido";
		}

		//validar la contraseña
		if(!empty($password)){
			$password_validado=true;
		}else{
			$password_validado=false;
			$errores['password']="la contraseña esta vacia";
		}


		$guardar_usuario=false;

		if(count($errores)==0){
			$guardar_usuario=true;


			//cifrar contraseña
			$password_segura=password_hash($password, PASSWORD_BCRYPT,['cost'=>4]);

			$sql="INSERT INTO usuarios VALUES (null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE())";
			$guardar=mysqli_query($conexion,$sql);

				
			if($guardar){
				$_SESSION['completado']="El registro se ha completado con exito";


			}else{
				$_SESSION['errores']['general']="Fallo al guardar al usuario";
			}

		}else{
			$_SESSION['errores']=$errores;
				
		}
	}

 ?>