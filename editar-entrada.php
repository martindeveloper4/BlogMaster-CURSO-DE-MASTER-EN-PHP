<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php 
		$entrada_actual=conseguirEntrada($conexion,$_GET['identradas']);
		if(!isset($entrada_actual['identradas'])){
			header("Location: index.php");
		}
?>

<?php require_once 'includes/header.php'; ?>		
<?php require_once 'includes/sidebar.php'; ?>
		
<!-- CAJA PRINCIPAL -->
<div id="principal">
	<h1>Editar entradas</h1>
	<p>
		Edita tu entrada <?=$entrada_actual['titulo'] ?>
	</p>
	<br/>
	<form action="php/entradas/guardar-entrada.php?editar=<?=$entrada_actual['identradas']  ?> " method="POST">
		<label for="titulo">Titulo:</label>
		<input type="text" name="titulo"  value="<?=$entrada_actual['titulo'] ?>" />
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

		<label for="descripcion">Descripción:</label>
		<textarea name="descripcion" ><?=$entrada_actual['descripcion'] ?></textarea>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

		<label for="categoria">Categoría</label>
		<select name="categoria">
			<?php 
				$categorias = conseguirCategorias($conexion); 
				if(!empty($categorias)):
				while($categoria = mysqli_fetch_assoc($categorias)): 
			?>
				<option value="<?=$categoria['idcategorias']?>" <?=($categoria['idcategorias'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : '' ?>>
	
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