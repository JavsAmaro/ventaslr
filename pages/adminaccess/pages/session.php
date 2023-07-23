<?php
//Iniciamos el inicio de sesion 
	
	session_start();
	//Creamos una nueva funcion para revisar si la variable member_id (id del miembro)
	function logged_in() {
		return isset($_SESSION['MEMBER_ID']);
        
	}
	//esta función si el miembro de la sesión no está configurado, será redirigido a la pagina login.php
	function confirm_logged_in() {
		if (!logged_in()) {
?>
			<script type="text/javascript">
				window.location = "login.php";
			</script>
<?php
		}
	}
?>