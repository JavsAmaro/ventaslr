<?php
include('../includes/connection.php');


			$zz = $_POST['id'];
			$pc = $_POST['prodcant'];
			$pname = $_POST['prodname'];
            $desc = $_POST['description'];
            $pr = $_POST['price'];
            $cat = $_POST['category'];
		
	 			$query = 'UPDATE product set NAME="'.$pname.'",
					DESCRIPTION="'.$desc.'", PRICE="'.$pr.'", QTY_STOCK="'.$pc.'", CATEGORY_ID ="'.$cat.'" WHERE
					PRODUCT_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("Actualizó el producto con éxito.");
			window.location = "product-encargado.php";
		</script>