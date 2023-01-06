<link value="" id="link_css" rel="stylesheet" href="../css/style.css?">
<?php 

	require '../dados_bd.php'; // Chama  as configurações do banco de dados

    // resgata variáveis do formulário
	// O comando isset não permite a insersão de dados pos SQL injection e danificando ou modificando os dados do banco.
	$login = trim(isset($_POST['login'])) ? $_POST['login'] : '';
	$password1 = trim(isset($_POST['password1'])) ? $_POST['password1'] : '';
	$password2 = trim(isset($_POST['password2'])) ? $_POST['password2'] : '';
    
	// Compara se todos os dados foram inseridos  
	if(empty($login) || empty($password1) || empty($password2)){

        echo 
        '<div class="wrapper wrapgrade">'.
            '<div class="title">'
                .'Informe Nome, Senha e Senha novamente.'.
            '</div>'.
        '</div>';

        echo "
        <script>
            setTimeout(function () {    
                window.location.href = 'cadastro_login.php'; 
            }, 2500); // 2 e 1/2 seconds
        </script>";

        exit;
	}

    // Compara se as senhas digitadas são iguais  
	if($password1 != $password2){

        echo 
        '<div class="wrapper wrapgrade">'.
            '<div class="title">'
                .'As senhas não são iguais.'.
            '</div>'.
        '</div>';

        echo "
        <script>
            setTimeout(function () {    
                window.location.href = 'cadastro_login.php'; 
            }, 2500); // 2 e 1/2 seconds
        </script>";

        exit;
	}
    else{
        
        // Utiliza a configuração na pagina function para criar o hash do login e senha e para salvar o hash no BD
        $passwordHash =  pass_hash($password1, $login);
               
        $PDO = db_connect(); // Chama  a função na pagina function.php que conecta com o banco de dados 
        
        //$sql = "INSERT INTO users SET login = '$login', password = :pass"; 

        $stmt = $PDO->prepare("INSERT INTO users (login, password) VALUES (:login, :pass)");
        $stmt->bindParam(':login', $login, PDO::PARAM_STR); 
        $stmt->bindParam(':pass', $passwordHash, PDO::PARAM_STR); 
        $stmt->execute();
        $id = $PDO->lastInsertId(); // Pega o atual usuario incerido na tabela
    
        if ($id > 0){

            //$_SESSION['logged_in'] = true; // Armazena o valor boleano como verdadeiro na sessão
            //$_SESSION['user_id'] = $id; // Armazena o ID do usuario na variavel sessão

            echo 
            '<div class="wrapper wrapgrade">'.
                '<div class="title">'
                    .'Dados cadastrados com sucesso'.
                '</div>'.
            '</div>';

            echo "
                <script>
                    setTimeout(function () { 
                        window.location.href = 'form_login.php'; 
                    }); 
                </script>"
            ;
            exit;
            
        }
        else{

            echo 
                '<div class="wrapper wrapgrade">'.
                    '<div class="title">'
                        .'Dados não cadastrados'.
                    '</div>'.
                '</div>'
            ;

            echo "
                <script>
                    setTimeout(function () {    
                        window.location.href = 'cadastro_login.php'; 
                    }, 4000); // 4 seconds
                </script>"
            ; 
            exit;  
        }	 
        
    }
?>

 