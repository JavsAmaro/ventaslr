<?php
include'../includes/connection.php';

             $nombreImg=$_FILES['image']['name'];

			$ruta=$_FILES['image']['tmp_name'];
			   /* $destino="img/".$nombreImg;*/
			$target_Path = "img/";
			$target_Path = $target_Path.basename( $_FILES['image']['name'] );
			move_uploaded_file( $_FILES['image']['tmp_name'], $target_Path );

			$zz = $_POST['id'];
			$fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $gen = $_POST['gender'];
            $email = $_POST['email'];
            $vacante = $_POST['job'];         
            $phone = $_POST['phone'];
            $hdate = $_POST['hireddate'];
		    $sueldo = $_POST['sueldo'];

	 			$query = 'UPDATE employee e set FIRST_NAME="'.$fname.'",
					LAST_NAME="'.$lname.'",
					GENDER="'.$gen.'", EMAIL="'.$email.'", PHONE_NUMBER="'.$phone.'", HIRED_DATE ="'.$hdate.'", SUELDO ="'.$sueldo.'", HOJA_SALIDA="'.$nombreImg.'", JOB_ID ="'.$vacante.'" WHERE EMPLOYEE_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

/*
	$query = 'UPDATE employee e join location l on l.LOCATION_ID=e.LOCATION_ID set FIRST_NAME="'.$fname.'",
					LAST_NAME="'.$lname.'",
					GENDER="'.$gen.'", EMAIL="'.$email.'", PHONE_NUMBER="'.$phone.'", HIRED_DATE ="'.$hdate.'", SUELDO ="'.$sueldo.'", HOJA_SALIDA="'.$nombreImg.'", JOB_ID ="'.$vacante.'" WHERE EMPLOYEE_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
*/
							
?>	
	<script type="text/javascript">
			alert("Actualizó al empleado con éxito.");
  window.history.back();
	</script>