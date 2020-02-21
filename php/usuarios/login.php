<?php 
	
	//iniciar la sesion y la conexion a bd
	require_once '../../includes/conexion.php';

	//Escoger datos del formulario
	if(isset($_POST)){
		$borrado = false;
		

		//Borrar datos de la sesion antigua
		if(isset($_SESSION['error_login'])){
			$_SESSION['error_login'] = null;
			$borrado = true;
		}

		//trim() - para evitar el espaciado en el email
		//datos del formulario
		$email=trim($_POST['email']);
		$password=$_POST['password'];

		// Consulta para comprobar las credenciales del usuario
		$sql="SELECT * FROM usuarios WHERE email='$email'";
		$login=mysqli_query($conexion,$sql);

		//mysqli_num_row() numero de filas que me duvuelve la consulta
		if($login && mysqli_num_rows($login) == 1){
			$usuario=mysqli_fetch_assoc($login);
			
			// Comprobar la contraseña
			$verify=password_verify($password, $usuario['password']);
			
			if($verify){
				//Utilizar una sesion para guardar los datos del usuario
				$_SESSION['usuario'] = $usuario;
			}else{
				//Si algo falla a enviar, enviar una sesion de fallo
				$_SESSION['error_login'] = "Login incorrecto!!";
			}

		}else{
			// mensaje de error
			$_SESSION['error_login'] = "Login incorrecto!!";
			

		}

	}

// Redirigir al index.php
header('Location:../../index.php');
 ?>