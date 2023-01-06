<?php 
         
    session_start();

    require 'dados_bd.php';

    $name = trim(isset($_POST['nome'])) ? $_POST['nome'] : ''; // resgata variáveis do formulário
    $quantidade = isset($_POST['number']) ? $_POST['number'] : ''; // resgata variáveis do formulário
    
    $PDO = db_connect(); // COnecta no BD
    
    $sql = " SELECT * FROM assistencia WHERE nome in(:nome) AND data = current_date() ";
                
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $name, PDO::PARAM_STR);
    $stmt->execute();
    $dados_user = $stmt->fetch(PDO::FETCH_ASSOC);
                
    // Caso se o BD não retornar valor nenhum ou null o valor é comparado como false, caso retorne algum valor compara com o do POST
    if($name == isset($dados_user['nome']) ?? false){
                    
        $_SESSION['user_id'] = $dados_user['id'];
    
        echo "<script>location.href='dados_reuniao.php'</script>";
                    
    }else{
                   
       // $ip_cliente = substr($_SERVER['REMOTE_ADDR'], 0, 18);//Apenas os primeiros 20 caracteres
        
        $ipHash = ip_hash(substr($_SERVER['REMOTE_ADDR'], 0, 18));// Criptografa o ip do cliente
    
        //$sql = "INSERT INTO assistencia SET nome = '$name', quantidade = '$quantidade', data = current_date(), ip_cliente = '$ipHash' "; 

        $stmt = $PDO->prepare(" INSERT INTO assistencia (nome, quantidade, data, ip_cliente) VALUES (:nome, :quantidade, current_date(), '$ipHash') ");
        //$stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nome', $name, PDO::PARAM_STR);
        $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);		 
        $stmt->execute();	
        $id = $PDO->lastInsertId(); 

        if($id > 0 ){
            $_SESSION['user_id'] = $id;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        
        <link type="text/css" rel="stylesheet" href="css/style.css?<?=time()?>"/> 
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    </head>

    <body class="bg-light">
        
        <?php          
            if($id > 0 ){

                echo 
                    '<div class="center-box d-flex position-relative justify-content-center align-items-center">'.
                        '<div class="notices-title p-3 mb-2 bg-secondary text-center text-white">'
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
                    
            }
            else{

                echo 
                    '<div class="center-box d-flex position-relative justify-content-center align-items-center">'.
                        '<div class="notices-title p-3 mb-2 bg-secondary text-center text-white">'
                            .'Dados não cadastrado!'.
                        '</div>'.
                    '</div>'
                ;

                echo "
                    <script>
                        setTimeout(function () {    
                            window.location.href = 'index.php'; 
                        }, 4000); // 4 seconds
                    </script>"
                ;
                       
            }
               
        ?>

        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    </body>

</html>