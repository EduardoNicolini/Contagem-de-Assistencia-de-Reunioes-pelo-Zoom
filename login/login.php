<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        
        <link type="text/css" rel="stylesheet" href="../css/style.css?<?=time()?>"> 
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    </head>

    <body class="bg-light">
        
        <?php 
            session_start();// inicia a sessão 
            /**
             * https://www.php.net/manual/pt_BR/pdo.constants.php
            */
            require '../dados_bd.php';// Chama  as configurações do banco de dados
            
            // O comando isset não permite a insersão de dados pos SQL injection e danificando ou modificando os dados do banco.
            $login = isset($_POST['login']) ? $_POST['login'] : ' '; 
            
            // resgata variáveis do formulário
            $password = isset($_POST['password']) ? $_POST['password'] : ' ';
            
            if (empty($login) || empty($password)){   
                
                echo 
                    '<div class="center-box d-flex position-relative justify-content-center align-items-center">'.
                        '<div class="notices-title p-3 mb-2 bg-secondary text-center text-white">'
                            .'Informe o Login e a Senha'.
                        '</div>'.
                    '</div>'
                ;
                
                
                echo "
                    <script>
                        setTimeout(function () {    
                            window.location.href = 'form_login.php'; 
                        }, 2500); // 2 e 1/2 seconds
                    </script>"
                ;

                exit;
                
            }
                
            $PDO = db_connect(); // Chama  a função na pagina function.php que conecta com o banco de dados 

            $sql = "SELECT * FROM users WHERE login = :usuer";
            
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':usuer', $login, PDO::PARAM_STR);  
            $stmt->execute();
            $users = $stmt->fetch(PDO::FETCH_ASSOC);

            $passHash = $users['password']; // Seleciona a senha criptografada no banco 
        
            // Se a senha for verdadeira segue as instruções a seguir
            if(password_verify(hash_hmac('sha3-512', $password, $login), $passHash)){

                $passwordHash =  pass_hash($password, $login);
            
                $sql = "UPDATE users SET password = '$passwordHash' WHERE id = :idUser "; 
            
                $stmt = $PDO->prepare($sql); 
                $stmt->bindParam(':idUser', $users['id'], PDO::PARAM_INT);
                $stmt->execute();

                $_SESSION['logged_in'] = true; // Seta o valor verdadeiro na sessão a ser comparada na função
                $_SESSION['user_id'] = $users['id']; // Armazena o id do usuario na sessão

                // Direciona para a pagina admin.
                echo "
                    <script>
                        setTimeout(function () { 
                            window.location.href = '../admin.php'; 
                        }); 
                    </script>"
                ;

                exit;
            }
            else{

                echo 
                '<div class="center-box d-flex position-relative justify-content-center align-items-center">'.
                    '<div class="notices-title p-3 mb-2 bg-secondary text-center text-white">'
                        .'Usuario ou senha incorretos'.
                    '</div>'.
                '</div>'
                ;

                echo "
                    <script>
                        setTimeout(function () {    
                            window.location.href = 'form_login.php'; 
                        }, 2500); // 2 e 1/2 seconds
                    </script>"
                ;

                exit;
            }	
        ?>

        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    </body>

</html>
