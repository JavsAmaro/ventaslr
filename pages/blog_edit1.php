<?php
include('../includes/connection.php');


			$titulo = $_POST['titulo'];
			$fecha_publicacion = $_POST['fecha_publicacion'];
			$descripcion = $_POST['descripcion'];
            $contenido = $_POST['contenido'];
            $link = $_POST['link'];
            $id = $_POST['id'];
		
	 			$query = 'UPDATE blog set 
					TITULO="'.$titulo.'", FECHA_PUBLICACION="'.$fecha_publicacion.'", DESCRIPCION="'.$descripcion.'", CONTENIDO ="'.$contenido.'",LINK ="'.$link.'" WHERE
					BLOG_ID ="'.$id.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("Actualizó el producto con éxito.");
			window.location = "blog-admin.php";
		</script>