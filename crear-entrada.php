<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/header.php'; ?>	
<?php require_once 'includes/sidebar.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
	<h1>Crear entradas</h1>
	<p>
		Añade nuevas entradas al blog para que los usuarios puedan
		leerlas y disfrutar de nuestro contenido.
	</p>
	<br/>
	<form action="php/entradas/guardar-entrada.php" method="POST">
		<label for="titulo">Titulo:</label>
		<input type="text" name="titulo" />
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

		<label for="descripcion">Descripción:</label>
		<textarea name="descripcion"></textarea>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

		<label for="categoria">Categoría</label>
		<select name="categoria">
			<?php 
				$categorias = conseguirCategorias($conexion); 
				if(!empty($categorias)):
				while($categoria = mysqli_fetch_assoc($categorias)): 
			?>
				<option value="<?=$categoria['idcategorias']?>">
					<?=$categoria['nombre']?>
				</option>
			<?php
				endwhile;
				endif;
			?>
		</select>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>

		<input type="submit" value="Guardar" />
	</form>

	<?php borrarErrores(); ?> 
</div> <!--fin principal-->
			
<?php require_once 'includes/footer.php'; ?>