<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			$fname = $_POST['firstname'];
		    $lname = $_POST['lastname'];
			$phone = $_POST['phone'];
			$direccion = $_POST['direccion'];
	   	
		
	 			$query = 'UPDATE customer set FIRST_NAME ="'.$fname.'",
					LAST_NAME ="'.$lname.'", PHONE_NUMBER="'.$phone.'", DIRECCION ="'.$direccion.'" WHERE
					CUST_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("Actualizó al cliente con éxito.");
			window.location = "customer-encargado.php";
		</script>