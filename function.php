<?php
 
	/* Conecta com o MySQL usando PDO */
	function db_connect(){

	    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
	 
	    return $PDO;
	}
	
	/**
	* Algoritimo de hash da senha, usando criptografia e custo
	*/
	function pass_hash($pass, $user){
		
		return password_hash(hash_hmac('sha3-512', $pass, $user), PASSWORD_DEFAULT, ['cost' => 10]);
		
	}

	/**
	* Algoritimo para criptografar o ip, usando criptografia e custo
	*/
	function ip_hash($ipHash){

		$options = [
			'cost' => 10,
		];

		$Hash_ip = hash('sha3-512', $ipHash);

		$cripto_ip = password_hash($Hash_ip, PASSWORD_DEFAULT, $options);

	    return $cripto_ip;
		
	}

	/**
	 * Verifica se o usuário está logado
	*/
	
	function isLoggedIn(){

		// Se a session conter algum valor igual a verdadeiro retorna verdadeiro do contrario falso  
		return (isset($_SESSION['logged_in']) == true ) ? true : false ;

	}
?>
     
