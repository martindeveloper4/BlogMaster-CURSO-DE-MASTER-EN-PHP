
<?php require_once 'includes/header.php'; ?>
		
		<?php require_once 'includes/sidebar.php'; ?>

		<div id="principal">
			<h1>Ultimas las entradas</h1>
			<?php 
				$entradas= conseguirEntradas($conexion,true);
				if(!empty($entradas)):
					while($entrada = mysqli_fetch_assoc($entradas)):		 
			?>
				<article class="entrada">
					<a href="entrada.php?identradas=<?=$entrada['identradas']?>">
						<h2><?=$entrada['titulo'] ?></h2>
						<span><?=$entrada['categoria'].' | '.$entrada['fecha'] ?></span>
						<p>
							<?=substr($entrada['descripcion'], 0, 300)."..."?>
						</p>
					</a>
				</article>
			<?php 
				endwhile;
				endif;
			 ?>
			<div id="ver-todas">
				<a href="entradas.php">Ver todas las entradas</a>
			</div>
		</div>



	<!-- PIEDA DE PAGINA -->
	<?php require_once 'includes/footer.php' ?>