<?php
 
	/**
	 * https://www.php.net/manual/pt_BR/function.session-destroy.php
	*/

	// inicia a sessão
	session_start();
	 
	// muda o valor de logged_in para false
	//$_SESSION = array();
	unset($_SESSION['logged_in'], $_SESSION['user_id']);
	//$_SESSION['logged_in'] = false;
		 
	// finaliza a sessão
	session_destroy();
		 
	// retorna para a index.php
	echo "<script>location.href='../index.php'</script>";


?>
