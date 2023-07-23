<?php
include('../includes/connection.php');

			$zz = $_POST['id'];
			$d = $_POST['username'];
            $e = $_POST['password'];
           // $l = $_POST['type'];
		
	 			$query = 'UPDATE users set USERNAME="'.$d.'", PASSWORD = sha1("'.$e.'") WHERE ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));							
?>
				<script type="text/javascript">
	                alert("Has actualizado la cuenta correctamente.");
 			window.history.back();
            	</script>