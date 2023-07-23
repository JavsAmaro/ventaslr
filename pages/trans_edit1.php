<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			$numofitems = $_POST['numofitems'];
		    $grandtotal = $_POST['grandtotal'];
			$cash = $_POST['cash'];

	   	
		
	 			$query = 'UPDATE transaction set NUMOFITEMS ="'.$numofitems.'",
					GRANDTOTAL ="'.$grandtotal.'", CASH="'.$cash.'" WHERE
					CUST_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("Actualizó al cliente con éxito.");
 			window.history.back();
 		</script>