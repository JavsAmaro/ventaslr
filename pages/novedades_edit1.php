<?php
include('../includes/connection.php');


			$titulo = $_POST['titulo'];
			$fecha_publicacion = $_POST['fecha_publicacion'];
			$caducidad = $_POST['caducidad'];
			$descripcion = $_POST['descripcion'];
            $contenido = $_POST['contenido'];
            $tipo =  $_POST['tipo'];
            $id = $_POST['id'];
		
	 			$query = 'UPDATE ofertas set 
					TITULO="'.$titulo.'", FECHA_PUBLICACION="'.$fecha_publicacion.'",CADUCIDAD="'.$caducidad.'", DESCRIPCION="'.$descripcion.'", CONTENIDO ="'.$contenido.'",TYPE ="'.$tipo.'" WHERE
					ID_OFERTA ="'.$id.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("Actualizó la novedad con éxito.");
			window.location = "novedades-admin.php";
		</script>