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

	<h1>Entradas de <?=$entrada_actual['titulo']?></h1>
	<a href="categoria.php?idcategorias=<?=$entrada_actual['categoria_id']?>">
		<h2><?=$entrada_actual['categoria']?></h2>
	</a>
	<h4><?=$entrada_actual['fecha'] ?> | <?=$entrada_actual['usuario'] ?> </h4>
	<p>
		<?=$entrada_actual['descripcion']?>
	</p>

	<?php if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['idusuarios'] == $entrada_actual['usuario_id']): ?>
		<br/>	
		<a href="editar-entrada.php?identradas=<?=$entrada_actual['identradas']?>" class="boton boton-verde">Editar entrada</a>
		<a href="borrar-entrada.php?identradas=<?=$entrada_actual['identradas']?>" class="boton">Eliminar entrada</a>
	<?php endif; ?>	
	
</div> <!--fin principal-->
			
<?php require_once 'includes/footer.php'; ?>