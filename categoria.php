<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
	<?php 
			$categoria_actual=conseguirCategoria($conexion,$_GET['idcategorias']);
			if(!isset($categoria_actual['idcategorias'])){
				header("Location: index.php");
			}
	?>

<?php require_once 'includes/header.php'; ?>		
<?php require_once 'includes/sidebar.php'; ?>
		
<!-- CAJA PRINCIPAL -->
<div id="principal">

	<h1>Entradas de <?=$categoria_actual['nombre']?></h1>
	<?php 
		$entradas = conseguirEntradas($conexion,null,$_GET['idcategorias']);
		if(!empty($entradas) && mysqli_num_rows($entradas)>= 1):
			while($entrada = mysqli_fetch_assoc($entradas)):
	?>
				<article class="entrada">
					<a href="entrada.php?identradas=<?=$entrada['identradas']?>">
						<h2><?=$entrada['titulo']?></h2>
						<span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
						<p>
							<?=substr($entrada['descripcion'], 0, 180)."..."?>
						</p>
					</a>
				</article>
	<?php
			endwhile;
		endif;
	?>
</div> <!--fin principal-->
			
<?php require_once 'includes/footer.php'; ?>