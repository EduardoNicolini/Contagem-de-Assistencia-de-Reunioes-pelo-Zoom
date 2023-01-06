<?php
    session_start();

    require 'dados_bd.php';
   // require_once 'function.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        
        <link type="text/css" rel="stylesheet" href="css/style.css?<?=time()?>"/> 

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <title>Dados para logar na reunião</title>

        <!-- Versão completa da biblioteca jQuery-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        
    </head>
    
    <body class="bg-light">
        
        <div class="container-fluid">

            <?php  if(isLoggedIn())://Chama a função na pagina function.php que confere se o usuario está logado ou não.
                // Tudo o que está dentro do if não aparece se tentarem acessar a pagina não entando logado. ?>

                <header class="d-flex position-relative">
                    
                    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> -->
                    <nav class="bg-secondary navbar navbar-expand-md fixed-top">

                        <div class="container-fluid">

                            <button type="button" class="btn btn-outline-light my-1 my-sm-0 d-sm-none btn-menu">Menu</button>

                            <ul class="navbar-nav mr-auto mt-0 mt-lg-0"></ul>
 
                            <a href="login/logout.php">
                                <button class="btn btn-outline-light my-1 my-sm-0 mr-3 mr-sm-0 mr-md-3 mr-lg-0" type="submit">Sair</button>
                            </a>
                            
                        </div>
                    </nav>

                </header>
                
                <div class="row">   
            
                    <nav class="col-6 col-sm-3 col-md-3 col-lg-2 padrao-pg-adm px-0 w-100 d-none d-sm-block exb_ocult" style="margin-top: 54px;">
        
                        <div class="list-group" id="list-tab" role="tablist" aria-labelledby="btnGroupDrop1">

                            <a class="list-group-item list-group-item-action active btn-menu" data-toggle="list" href="#list-zoom" >

                                <div class="d-flex align-items-center">
                                    <span class="material-icons pb-1">videocam</span> 
                                    <span class="pl-2">Zoom</span>
                                </div>

                            </a>

                            <button class="list-group-item list-group-item-action btn-menu" data-toggle="list" href="#list-assistance">Assistencia</button>
                            <a class="list-group-item list-group-item-action btn-menu d-none" data-toggle="list" href="#list-mensagens">Mensagens</a>
                            <a class="list-group-item list-group-item-action btn-menu d-none" data-toggle="list" href="#list-settings">Configurações</a>
                        </div>
                        
                    </nav>
                            
                    <main class="col-sm-9 col-md-9 col-lg-10 padrao-pg-adm w-100 px-0 " style="margin-top: 54px;">    
                            
                                <div class="tab-content" id="nav-tabContent">
                                    
                                    <!-- Conteudo referente ao botão Zoom do menu lateral -->
                                    <div class="tab-pane fade show active" id="list-zoom">
                                        
                                        <div class="padrao-pg-adm d-flex align-items-center justify-content-center">

                                                <div class="row justify-content-center">
                                                
                                                    <div class="col-sm-8 col-md-5 col-lg-4">

                                                    <div class="col-12 d-sm-none py-3 "></div> <!-- Esconde em telas maiores -->

                                                        <div class="shadow border rounded">
                                                            
                                                            <div class="bg-secondary text-center border rounded  px-4 py-2 ">
        
                                                                <label class="text-white h5 mb-0 ">Informe o id e senha do Zoom</label>
        
                                                            </div>
        
                                                            <form>
                                                                
                                                                <div class="input-group px-4 my-3 my-sm-4 my-md-4 my-lg-4 ">
        
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text font-weight-bold">Link:</span>
                                                                    </div>
        
                                                                    <input type="text" class="border_remove form-control" name="link" id="link">
        
                                                                </div>
                                                                                    
                                                                <div class="input-group px-4 my-3 my-sm-4 my-md-4 my-lg-4 ">
        
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text font-weight-bold">ID:</span>
                                                                    </div>
        
                                                                    <input type="text" class="border_remove input-box form-control text-center font-weight-bold" name="id" maxlength="13" onkeypress="id_number(this)">
        
                                                                </div>
        
                                                                <div class="input-group px-4 mt-3 mt-sm-4 mt-md-4 mt-lg-4">
        
                                                                    <div class="input-group-prepend">
        
                                                                        <span class="input-group-text font-weight-bold">Senha:</span>
                                                                        
                                                                    </div>
                                                                    
                                                                    <input type="text" class="border_remove input-box form-control text-center font-weight-bold" name="senha" id="senha">
        
                                                                </div>
        
                                                                <div class="d-flex justify-content-center py-3 py-sm-4 py-md-4 py-lg-4">
                                                                    
                                                                    <button 
                                                                        type="submit" 
                                                                        class="btn btn-secondary text-white text-center rounded bnt-link" 
                                                                        data-toggle="modal" 
                                                                        data-target="#myModal">Armazenar dados
                                                
                                                                    </button>
                                                                    
                                                                </div>
        
                                                            </form>
                                                            
                                                        </div>
        
                                                    </div>
                                                    
                                                    <div class="col-12 d-md-none py-3"></div> <!-- Mostra em telas menores -->
                                                    <div class="d-none d-md-block px-lg-5"></div> <!-- Esconde em telas menores -->

                                                    <div class="col-sm-8 col-md-5 col-lg-4">
        
                                                        <div class="shadow border rounded">
                                                            
                                                            <div class="bg-secondary text-center border rounded px-4 py-2">
        
                                                                <label class="text-white h5 mb-0 ">Dados do Zoom armazenados no Banco de Dados</label>
        
                                                            </div>
        
                                                            <div class="input-group px-4 my-3 my-sm-4 my-md-4 my-lg-4 ">
        
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text font-weight-bold">Link:</span>
                                                                </div>
        
                                                                <span class="form-control text-center p-0 font-weight-bold bg-white"><input class="w-100 px-2 pt-1" type="text" id="link_zoom"></span>
        
                                                            </div>
                                                                                
                                                            <div class="input-group px-4 my-3 my-sm-4 my-md-4 my-lg-4 ">
        
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text font-weight-bold">ID:</span>
                                                                </div>
        
                                                                <span class="form-control text-center p-0 font-weight-bold bg-white"><label class="h4 pt-1" id="id_zoom"></label></span>
        
                                                            </div>
        
                                                            <div class="input-group px-4 my-3 my-sm-4 my-md-4 my-lg-4 ">
        
                                                                <div class="input-group-prepend">
        
                                                                    <span class="input-group-text font-weight-bold">Senha:</span>
                                                                    
                                                                </div>
                                                                <span class="form-control text-center p-0 font-weight-bold bg-white"><label class="h4 pt-1" id="password_zoom"></label></span>
        
                                                            </div>
        
                                                            <div class="input-group justify-content-center align-items-center px-4 my-4 ">
            
                                                                <button 
                                                                    type="submit" 
                                                                    class="btn btn-secondary text-white text-center rounded bnt-link" 
                                                                    id="bnt-enter"
                                                                    data-toggle="modal" 
                                                                    data-target="#myModal">Entrar na Reunião
                                                                </button>
            
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                                                        
                                        </div>

                                    </div>
                                    
                                    <!-- Conteudo referente ao botão Assistencia do menu lateral -->
                                    <div class="tab-pane fade" id="list-assistance">
                                    
                                        <div class="d-flex flex-column justify-content-center align-items-center ">
                                            
                                            <div class="col-12 d-none d-sm-block py-4"></div> <!-- Esconde em telas menores -->
                                            <div class="col-12 d-sm-none py-3 "></div> <!-- Esconde em telas maiores -->
                                        
                                            <div class="" style="width:200px;" >
                                                        
                                                <div class="bg-secondary text-center px-2 py-2 rounded-top" >
        
                                                    <label class="text-white h5 mb-0">Assistencia</label>
        
                                                </div>
        
                                                <div class="d-flex py-2 bg-white border shadow rounded" >    
            
                                                    <div class="col-12 flex-column">  
                                                        
                                                        <div class="input-group px-4 my-3 ">
            
                                                            <div class="input-group-prepend ">
                                                                <span class="input-group-text font-weight-bold">Total:</span>
                                                            </div>
            
                                                            <span class="form-control text-center p-0 font-weight-bold bg-white" ><label class="pt-1 h4" id="presential"></label></span>
            
                                                        </div>
            
                                                    </div>
        
                                                </div>
        
                                            </div>
                                            
                                            <div class="col-12 d-none d-sm-block py-4"></div> <!-- Esconde em telas menores -->
                                            <div class="col-12 d-sm-none py-3 "></div> <!-- Esconde em telas maiores que -->

                                            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-7 px-0 mx-0" >

                                                <div class="table-overflow table-responsive d-flex border shadow rounded " style="max-height:calc(55vh - 50px); min-height:calc(55vh - 50px); scroll-behavior: smooth;">
            
                                                    <!-- table table-striped table-hover sticky-->
                                                    <table class="table table-hover sticky bg-white" id="table-1" >     
                
                                                        <thead class="bg-secondary text-white">
            
                                                            <tr class="">
                                                                <th scope="col" class="title-table" style=" width: 60%;">Nome</th>
                                                                <th scope="col" class="title-table" >Quantidade</th>
                                                                <th scope="col" class="header-table-date">
                                                                    <input 
                                                                        type="date" 
                                                                        class="form-control font-weight-bold" 
                                                                        name="search_data" 
                                                                        id="search_data" 
                                                                        value='<?php echo date("Y-m-d"); ?>'
                                                                    >
                                                                </th>
                                                            </tr>
            
                                                        </thead>
                
                                                        <tbody  id="tbl_people"></tbody>
                
                                                    </table>
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>

                                    <div class="tab-pane fade border border-dark" id="list-mensagens">
                                        m
                                    </div>

                                    <div class="tab-pane fade border border-dark" id="list-settings">
                                        c
                                    </div>

                        </div>
                        
                    </main>
                    
                </div>
            <?php elseif (!isLoggedIn()) : ?>

                <div class="center-box w-100 d-flex position-relative justify-content-center align-items-center">

                    <div class="notices-title p-3 mb-2 bg-secondary text-center text-white ">Faça o login para acesar essa página</div>

                </div>
                <script>
                    setTimeout(function () {    
                        window.location.href = 'index.php'; 
                    }, 1000); // 2 seconds
                </script>"

            <?php endif; ?>

        </div>   
        
        <footer class="footer fixed-bottom w-100 text-muted">
                    
            <div class="container my-4 text-center">
                <span class="text-muted">© 2021 Eduardo Nicolini.</span>
            </div>

        </footer>
        
        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <script type="text/javascript" defer="defer">

            //var btn = document.getElementById('.btn-div');
            //var btn = document.querySelector('.btn-menu');
            var container = document.querySelector('.exb_ocult, .active');
            
            $('.btn-menu').on('click', function(){ menu() });
            
            function menu(){

                if(container.classList.contains('d-none')) {

                    //container.style.display = 'none' ;
                    container.classList.remove('d-none');

                } else {
                    
                    container.classList.add('d-none');
                    //container.style.display = 'block';

                }
            };            

            /*-------------------- Botão incremento Decremento -----------------------*/
            var contagem = document.querySelector('.contagem');

            $('.btn-calc').on('click', function(e) {

                if (this.id == 'incrementar') {

                    contagem.value = (contagem.value == '') ? 1 : parseInt(contagem.value) + 1;

                    if (parseInt(contagem.value) > 0) {
                        document.getElementById('decrementar').disabled = false;
                    }

                } else if (this.id == 'decrementar') {

                    if (parseInt(contagem.value) > 0) {
                        contagem.value = parseInt(contagem.value) - 1;
                    }

                    if (parseInt(contagem.value) <= 0) {
                        this.disabled = true;
                    }
                }
            });

            $('.contagem').on('input', function() {
                document.getElementById('decrementar').disabled = (this.value <= 0);
            });

            // Envia os dados de cadastro do link ID e Senha do Zoom
            $(function () {

                $('form').bind('click', function (event) {

                    // using this page stop being refreshing 
                    event.preventDefault();

                    $.ajax({

                        type: 'POST',
                        url: 'admin_bd.php',
                        data: $('form').serialize(),

                        success: function () {

                        }
                    });
                });
            });
                        
            function apagar(e){
                
                var confirm_del = confirm('Deseja realmete apagar esse dado?'); 

                if(confirm_del == true){

                    var del_data = $(e).attr('id');

                };

               // console.log($(e).attr('id'));
               
               $.ajax({   
                   
                    url: 'dados_tbl.php',   
                    type:'POST',
                    data: { 
                        delete_dados : del_data // Preciso usar a variavel no botão excluir aqui
                    },
                    cache : false,
                        
                    success: function(deleted){
                        
                    }
                    
                });
                
            };
            
            // Responsavel por trazer o valor da contagem da assistencia do banco de dados
            $(document).ready(function(){
            
                setInterval(function(){                       
                         
                    $.ajax({    
                       
                        url: 'dados_admin2.php',
                        method: 'POST',     
                        dataType: 'json',
                        data: {
                            select_date : $('#search_data').val(), 
                        },
                       /*
                       beforeSend: function(){
                            $("#dados").html("Carregando...");
                        },
                        */
                        success: function(result){

                            $('#remote').text(result.total_remote);
                            $('#presential').text(result.total_presential);
                            $('#id_zoom').text(result.idzoom);            
                            $('#password_zoom').text(result.senha);
                            $('#link_zoom').val(result.link);
                            
                        }                                                   
                        
                    }); 
 
                    
                    $.post("dados_tbl.php", {
                                        
                        select_date : $('#search_data').val()
                    }, 
                                                        
                    function(msg){

                        $("#tbl_people").html(msg);
                       
                    }) 

                    $.ajax({    
                                    
                        url: 'dados_admin.php',
                        method: 'POST',     
                        dataType: 'json',
                        async: true,
                        success: function(result){
            
                            $('#bnt-enter').click(function(){ window.open(result.link); });
                                    
                        }                                                   
                                            
                    }); 
            
                }, 1000);//o setInterval será executado a cada 1 segundo.     
                
            })
            
        </script>
    </body>
</html>