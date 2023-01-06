<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        
        <link type="text/css" rel="stylesheet" href="css/style.css?<?=time()?>"/> 
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        
        <title>Dados para logar na reunião</title>

    </head>
    
    <body>
        <header class="d-flex position-relative">
            
            <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> -->
            <nav class="bg-secondary navbar navbar-expand-md fixed-top">

                <div class="container-fluid">

                    <ul class="navbar-nav mr-auto mt-0 mt-lg-0"></ul>

                    <button type="submit" class="btn btn-outline-light my-1 my-sm-0" onclick="location.href='login/form_login.php'" data-toggle="modal" data-target="#myModal">login</button>

                </div>
            </nav>

        </header>

        <div class="container">

            <div class="row">

                <main role="main" class="center-box d-flex align-items-center justify-content-center">

                    <div class="col-sm-8 col-md-6 col-lg-4">

                        <div class="shadow flex-column border rounded">
                            
                            <div class="bg-secondary px-4 py-3 border rounded">

                                <label class="text-center text-white h3 mb-0 ">Para acessar o zoom em outros aparelhos insira o ID e Senha abaixo</label>

                            </div>
                                                
                            <div class="input-group px-4 mt-4 mb-2">

                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold">ID:</span>
                                </div>

                                <span class="form-control text-center p-0 font-weight-bold bg-white"><label class="h3" id="id"></label></span>

                            </div>

                            <div class="input-group px-4 mt-3 ">

                                <div class="input-group-prepend">

                                    <span class="input-group-text font-weight-bold">Senha:</span>
                                    
                                </div>

                                <span class="form-control text-center p-0 font-weight-bold bg-white"><label class="h3" id="password_zoom"></label></span>

                            </div>

                            <div class="input-group justify-content-center align-items-center px-4 my-4 ">

                                <button 
                                    type="submit" 
                                    class="btn btn-secondary text-white text-center rounded bnt-link" 
                                    data-toggle="modal" 
                                    data-target="#myModal">Entrar na Reunião
                                </button>

                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-center pt-5">
                            
                        </div>
                    </div>
                </main>
            </div>
        </div>         
        
        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <script type="text/javascript" defer="defer">

            // Função responsavel por inserir traços entre os numeros
            function id_number(id_zoom){ 
                
                if(id_zoom.value.length == 3)id_zoom.value = id_zoom.value + '-'; //quando o campo já tiver 3 caracteres, o script irá inserir um tracinho, para melhor visualização do valor.
                
                if(id_zoom.value.length == 8)id_zoom.value = id_zoom.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do valor.
                    
            }

            // Responsavel por trazer o valor da contagem da assistencia do banco de dados
            $(document).ready(function(){
                        
                setInterval(Requisicao, 1000);
                
                function Requisicao(){                        
                    
                    $.ajax({    
                                    
                        url: 'dados_admin.php',
                        method: 'POST',     
                        dataType: 'json',
                        async: true,
                        success: function(result){

                            $('#id').text(result.idzoom);            
                            $('#password_zoom').text(result.senha);
                            $('.bnt-link').click(function(){ window.open(result.link); });
                        
                        }                                                   
                                
                    });                            
                    
                }
            })
            
        </script>
    </body>
</html>