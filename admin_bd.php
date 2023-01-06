<link value="" id="link_css" rel="stylesheet" href="css/style.css?">
<?php 
    // https://www.php.net/manual/pt_BR/security.database.sql-injection.php
    require 'dados_bd.php';

    $link_zoom = trim(isset($_POST['link'])) ? $_POST['link'] : ''; // resgata variáveis do formulário
	$cod_id = trim(isset($_POST['id'])) ? $_POST['id'] : ''; // resgata variáveis do formulário
    $senha = trim(isset($_POST['senha'])) ? $_POST['senha'] : '';

    if (empty($link_zoom) || empty($cod_id) || empty($senha)){

        echo 
            '<div class="wrapper wrapgrade">'.
                '<div class="title">'
                    .'Informe o link o ID e a senha'.
                '</div>'.
            '</div>'
        ;

        echo "
            <script>
                setTimeout(function () {    
                    window.location.href = 'admin.php'; 
                }, 2500); // 2 e 1/2 seconds
            </script>"
        ;

        exit;
	}

    $PDO = db_connect();
    
    $stmt = $PDO->prepare("INSERT INTO dados_zoom (link, id_zoom, senha) VALUES (:link_zoom, :cod_id, :senha)");
    $stmt->bindParam(':link_zoom', $link_zoom, PDO::PARAM_STR);
    $stmt->bindParam(':cod_id', $cod_id, PDO::PARAM_STR);	
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);	 
    $stmt->execute();	

    $id = $PDO->lastInsertId();

    if($id > 0){

        echo 
            '<div class="wrapper wrapgrade">'.
                '<div class="title">'
                    .'Dados enviados com sucesso!'.
                '</div>'.
            '</div>'
        ;

        echo "
            <script>
                setTimeout(function () {    
                    window.location.href = 'dados_reuniao.php'; 
                }, 2000); // 2 seconds
            </script>"
        ;

	}else{

        echo 
            '<div class="wrapper wrapgrade">'.
                '<div class="title">'
                    .'Dados não cadastrado!'.
                '</div>'.
            '</div>'
        ;

        echo "
            <script>
                setTimeout(function () {    
                    window.location.href = 'admin.php'; 
                }, 4000); // 4 seconds
            </script>"
        ;

	}
?>