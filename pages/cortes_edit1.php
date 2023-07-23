<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			$tipo = $_POST['tipo'];
		    $monto = $_POST['monto'];
			$date = $_POST['date'];
			$descripcion = $_POST['descripcion'];

		
	 			$query = 'UPDATE cortes set TIPO ="'.$tipo.'",
					MONTO ="'.$monto.'", DATE="'.$date.'", DESCRIPCION="'.$descripcion.'" WHERE
					ID_CORTE ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("Actualizó al cliente con éxito.");
 			window.history.back();
		</script>