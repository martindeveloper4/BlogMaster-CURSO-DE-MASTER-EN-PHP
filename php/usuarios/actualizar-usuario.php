<?php 

	if(isset($_POST)){
		//Recoger los valores del formulario de registro
		require_once '../../includes/conexion.php';


		//mysqli_real_escape_string(), permite que se meta comillas en el input del formulario
		//formulario de actualizacion
		$nombre=isset($_POST['nombre'])? mysqli_real_escape_string($conexion, $_POST['nombre']):false;
		$apellidos=isset($_POST['apellidos'])? mysqli_real_escape_string($conexion, $_POST['apellidos']):false;
		$email=isset($_POST['email'])? mysqli_real_escape_string($conexion, trim($_POST['email'])):false;



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

		

		$guardar_usuario = false;
	
		if(count($errores) == 0){
			$usuario = $_SESSION['usuario'];
			$guardar_usuario = true;
		
		// COMPROBAR SI EL EMAIL YA EXISTE
			$sql = "SELECT idusuarios, email FROM usuarios WHERE email = '$email'";
			$isset_email = mysqli_query($conexion, $sql);
			$isset_user = mysqli_fetch_assoc($isset_email);
		
			if($isset_user['idusuarios'] == $usuario['idusuarios'] || empty($isset_user)){
				// ACTULIZAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
				
				$sql = "UPDATE usuarios SET ".
					   "nombre = '$nombre', ".
					   "apellidos = '$apellidos', ".
					   "email = '$email' ".
					   "WHERE idusuarios = ".$usuario['idusuarios'];
				$guardar = mysqli_query($conexion, $sql);


				if($guardar){
					$_SESSION['usuario']['nombre'] = $nombre;
					$_SESSION['usuario']['apellidos'] = $apellidos;
					$_SESSION['usuario']['email'] = $email;

					$_SESSION['completado'] = "Tus datos se han actualizado con éxito";
				}else{
					$_SESSION['errores']['general'] = "Fallo al guardar el actulizar tus datos!!";
				}
			}else{
				$_SESSION['errores']['general'] = "El usuario ya existe!!";
			}
			
		}else{
			$_SESSION['errores']=$errores;
				
		}
	}
header('Location: ../../mis-datos.php');

 ?>