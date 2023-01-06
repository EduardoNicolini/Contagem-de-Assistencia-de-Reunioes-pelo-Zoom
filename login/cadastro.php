
<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">		

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <link value="" id="link_css" rel="stylesheet" href="../css/style.css?">

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <title>Contagem da assistencia</title>
    </head>
    <body>
        <header>
        
            <div class="container">
                
                <div class="div-center col-sm-12">
                                                                
                    <form class="needs-validation" action="login.php" method="POST" >

                        <div class="wrapper wrapgrade">

                            <div class="title"><label class="title-box">Insira o Usuario e Senha</label></div>

                            <div class="box">                 
                                
                                <label>
                                    Usuario:&nbsp;
                                    <input type="text" class="border_remove form-control" name="login" id="link">
                                </label>
                                           
                                <label>
                                    Senha:&nbsp;
                                    <input type="password" class="border_remove input-box form-control" name="password" id="nome">
                                </label>

                                <!-- Trigger the modal with a button -->
                                <button type="submit" class="botao btn btn_grande" data-toggle="modal" data-target="#myModal">Entrar</button>
                                    
                            </div>
                        </div>
                    </form> 

                    <div class="pb-3"></div>

                        <div class="wrapper wrapgrade">
                                    
                            <div class="box">                 
                                                                
                                <button type="submit" class="botao btn btn_grande" onclick="location.href='cadastro_login.php'" data-toggle="modal" data-target="#myModal">Cadastrar-se</button>
                                
                            </div>
                        </div>
                                            
                    <div class="pb-3"></div>
                        
                    <div class="disable pb-2"></div>
                </div>                
            </div>
        </header>
        
        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>       
    </body>
    <!--<script src="ajax.js"></script> -->

    <script type="text/javascript" defer="defer">
        
        var d = new Date();
        var n = d.getMilliseconds(); 
                
        document.head.innerHTML += '<link rel="stylesheet" href="../css/style.css?'+n+'">';
           
    </script>
</html>