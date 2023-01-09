<?php

    //Definindo o prazo para a cache expirar em 60 minutos.
    session_cache_expire(180);

    //date_default_timezone_set('UTC');
    
    require 'dados_bd.php'; // Chama as configurações do BD
    
    $PDO = db_connect(); // Conecta no BD

    if (isset($_SESSION['user_id']) == true) {
        
        session_start();

        $id_sessao = $_SESSION['user_id'];
            
        $sql = " SELECT id FROM assistencia WHERE id in(:id_user)  AND data = current_date() ";

        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id_user', $id_sessao, PDO::PARAM_STR);
        $stmt->execute();
        $dados_user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Caso se o BD não retornar valor nenhum ou null o valor é comparado como false, caso retorne algum valor compara com o da sessão
        if ($id_sessao == isset($dados_user['id']) ?? false ) {
                
            echo "<script>location.href='dados_reuniao.php'</script>";

        }
            
    }
    else{

        $ip_cliente = substr($_SERVER['REMOTE_ADDR'], 0, 18); //Exibe apenas os primeiros 18 caracteres
        
        $sql = "SELECT id, ip_cliente FROM assistencia WHERE data = current_date()";
        
        $stmt = $PDO->prepare($sql);
        $stmt->execute();
        $dados_user = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
        if($dados_user > 0 ){
        
            $verify_hash = hash('sha3-512', $ip_cliente);
        
            foreach($dados_user as $dados){
        
                // Verify stored hash against plain-text password
                if (password_verify($verify_hash, $dados['ip_cliente'])) {
        
                    $_SESSION['user_id'] = $dados['id'];
                                
                    echo "<script>location.href='dados_reuniao.php'</script>";
                }
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <link type="text/css" rel="stylesheet" href="css/style.css?<?=time()?>"/>

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <title>Contagem de assistencia</title>

    </head>

    <body class="bg-light">

        <header class="d-flex position-relative">
            
            <nav class="bg-secondary navbar navbar-expand-md fixed-top">

                <div class="container-fluid">
                    
                    <ul class="navbar-nav mr-auto mt-0 mt-lg-0"></ul>

                    <button type="submit" class="btn btn-outline-light my-1 my-sm-0" onclick="location.href='login/form_login.php'" data-toggle="modal" data-target="#myModal">login</button>

                </div>
            </nav>

        </header>

        <div class="container">

            <div class="row">
                
                <div class="col-md-2 col-lg-2 col-xl-3 d-none d-md-block"></div>
                
                <main role="main" class="col-sm-12 col-md-9 col-lg-7 col-xl-6">
                    
                    <!-- Se o dia for igual ao programado compara a hora com a hora programada e exibe o formulario para ser preenxido  -->      
                    <div class="d-none dia-reuniao">
                        
                        <div class="d-none hora-reuniao">

                            <div class="col-12 d-none d-sm-block py-5"></div> <!-- Esconde em telas menores que sn 576px -->
                            <div class="col-12 d-sm-none py-5 "></div> <!-- Esconde em telas maiores que sn 576px -->

                            <section class="jumbotron bg-secondary position-relative text-center text-white shadow-lg rounded pt-2 pb-3 pt-sm-3 pt-md-3 pb-sm-4 pb-md-4 mb-3 mb-sm-5 mb-md-4 mt-1 mt-md-3 ">

                                <div class="container">

                                    <p class="jumb-text text-center h3"><strong>Contagem&nbsp;<br>de&nbsp;<br>assistência</strong></p>

                                    <hr class="bg-white my-3 my-sm-4 my-md-4">

                                    <small class="text-center h5">Por favor preencha os dados solicitados abaixo.</small>

                                </div>

                            </section>

                            <div class="col-12 d-none d-sm-block py-4"></div> <!-- Esconde em telas menores que sn 576px -->
                            
                            
                            <div class="ocultar">

                                <div class="col-12 d-sm-none py-5 "></div> <!-- Esconde em telas maiores que sn 576px -->

                                <div class="center w-100 d-flex position-relative justify-content-center align-items-center  ">
                                    
                                    <div class="col-sm-8 col-md-6 col-lg-8 ">

                                        <div class="shadow flex-column border rounded">
                                            
                                            <div class="bg-secondary px-4 py-3 border rounded">

                                                <label class="text-center text-white h3 mb-0 ">Escolha por onde irá assistir esta reunião</label>

                                            </div>
                                                                
                                        
                                            <div class="input-group justify-content-center align-items-center px-4 my-4 ">

                                                <button type="button" class="btn btn-secondary text-white text-center rounded assit_present" >Presencial Salão</button>

                                            </div>

                                            <div class="input-group justify-content-center align-items-center px-4 my-4 ">

                                                <button type="button" class="btn btn-secondary text-white text-center rounded assit_remoto" >Pelo Zoom</button>

                                            </div>
                                            
                                        </div>

                                        <div class="d-flex justify-content-center pt-5"></div>

                                    </div>

                                </div>

                            </div>

                            <div class="d-none exib_formCont">
                            
                                <form class="needs-validation" action="salva_bd.php" method="POST">

                                    <div class="bg-secondary px-4 pb-3 rounded">

                                        <label class="text-white pb-reset d-flex h4 pt-2 py-0 py-sm-2 py-md-2">Informe seu nome abaixo</label>

                                        <input class="box-name-assit form-control bg-white" type="nome" name="nome" id="nome" placeholder="Nome e sobrenome">

                                    </div>

                                    <div class="center w-100 d-flex position-relative justify-content-center align-items-center">

                                        <div class="position-absolute d-flex">

                                            <div class="d-flex flex-column align-items-center ">

                                                <p class="text-muted blockquote h6 mt-3 mt-sm-0 mt-md-0 mb-2 mb-sm-3 mb-md-3">Quantas pessoas estão presentes?</p>

                                                <div class="d-flex btn-box ">

                                                    <button type="button" class="bg-secondary text-center text-white h3 font-weight-bold btn1 btn-calc" id="decrementar" disabled><label>-</label></button>

                                                    <input type="text" class="bg-white text-dark text-center h2 contagem" id="number" name="number" value="0" placeholder="0">

                                                    <button type="button" class="bg-secondary text-center text-white h3 font-weight-bold btn2 btn-calc" id="incrementar"><label>+</label></button>

                                                </div>

                                                <div class="pt-5 pb-sm-3 pb-md-3"></div>
                                                
                                                <button type="submit" id="sub" class="btn btn-secondary text-white text-center rounded btn_submit" style="width: 255px; height: 50px; font-size: 1.4rem;" data-toggle="modal" data-target="#myModal" disabled>Clique aqui para enviar</button>

                                            </div>
                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div> <!-- fim da comparação de hora -->

                        <div class="d-none aguarde-reuniao">

                            <div class="center-box w-100 d-flex position-relative justify-content-center align-items-center fim_reuniao">

                                <div class="notices-title h2 p-3 mb-2 bg-secondary text-center text-white ">A reunião terá inicio as <label id="hora"></label> horas AGUARDE!</div>

                            </div>

                        </div>

                        <div class="d-none fim-reuniao">

                            <div class="center-box w-100 d-flex position-relative justify-content-center align-items-center fim_reuniao">

                                <div class="notices-title p-3 mb-2 bg-secondary text-center text-white ">Esta reunião foi encerrada!</div>

                            </div>

                        </div><!-- fim da comparação de hora -->

                        
                    </div> <!-- fim da comparação de data -->

                    <!-- Se a data não dor igual a data programada exibe a condição abaixo-->
                   
                    <div class="d-none sem-reuniao">

                        <div class="center-box w-100 d-flex position-relative justify-content-center align-items-center fim_reuniao">

                            <div class="notices-title h2 p-3 mb-2 bg-secondary text-center text-white ">Nenhuma reunião foi agendada para hoje</div>
                            
                        </div>

                    </div>
                    <!-- fim da condição de comparação de data fora da data programada -->

                </main>

                <!-- Coluna direita que empura o conteudo do main -->
                <div class="col-md-2 col-lg-2 col-xl-3 d-none d-md-block"></div>

                <footer class="footer w-100 text-muted">
                    
                    <div class="container my-4 text-center">
                        <span class="text-muted">© 2021 Eduardo Nicolini.</span>
                    </div>

                </footer>

            </div>

        </div>

        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <script type="text/javascript">

            // Script que verifica se o input nome está preenchido e se p valor inserido no imput class contagem é maior que 0 para liberar o botão submit
            $(document).ready(function() {

                //=========== Seleciona a classe HTML a ser tratada pelo JS ============
                var sem_reuniao = document.querySelector('.sem-reuniao');
                var dia_reuniao = document.querySelector('.dia-reuniao');
                var aguarde_reuniao = document.querySelector('.aguarde-reuniao');
                var hr_reuniao = document.querySelector('.hora-reuniao');
                var fim_reuniao = document.querySelector('.fim-reuniao');
                //======================================================================

                setInterval(Requisicao, 1000);

                function Requisicao(){ 

                    //========================= Pega data e horario local =========================
                    var dia_semana = ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"];

                    const dateHours = new Date();
                    let horas = dateHours.toLocaleTimeString().substr(0, 5); // Exibe o horario 00:00:00, ".substr(0, 5) deixa as horas 00:00"
                    let date = dateHours.toLocaleDateString().split('/').reverse().join('-'); // Exibe a data: e inverte data dd/MM/AAAA para AAA/MM/dd e cnverte / para -
                    var semana = dia_semana[dateHours.getDay()]; // Exibe o nome do dia da semana
                    //console.log(horas);
                    //======================================================================
                    
                    $.ajax({    
                        
                        url: 'horario_reuniaop.php',
                        method: 'POST',     
                        dataType: 'json',
                        async: true,

                        success: function(result){
                        
                            if (( semana == result.diaSemana) || (date == result.dataReuniao)){
                                
                                sem_reuniao.classList.add('d-none');
                                dia_reuniao.classList.remove('d-none'); // Atima a DIV dia de reunião
                                
                                if (horas < result.horario_1.substr(0, 5)){
                                    
                                    $('#hora').text(result.horario_1.substr(0, 5));
                                    aguarde_reuniao.classList.remove('d-none');
                                }

                                if ((horas >= result.horario_1.substr(0, 5)) && (horas <= result.horario_2.substr(0, 5))) {
                                    
                                    aguarde_reuniao.classList.add('d-none');
                                    fim_reuniao.classList.add('d-none');
                                    hr_reuniao.classList.remove('d-none');

                                }

                                if (horas > result.horario_2.substr(0, 5)){
                                    
                                    hr_reuniao.classList.add('d-none');
                                    aguarde_reuniao.classList.add('d-none');
                                    fim_reuniao.classList.remove('d-none');

                                } 
                                
                            }
                            else {
                                
                                fim_reuniao.classList.add('d-none');
                                dia_reuniao.classList.add('d-none');
                                sem_reuniao.classList.remove('d-none');

                            }

                        }                                                   
                                
                    });                            
                    
                };// O setInterval será executado a cada 1 segundo. 

            });
            // ======================== Fim do AJAX ==============================================

            var container = document.querySelector('.exib_formCont');
            var cont = document.querySelector('.ocultar');
            
            $('.assit_remoto ').on('click', function(){ menu() });
            
            function menu(){

                if(cont.classList.contains('ocultar')) {

                    cont.classList.add('d-none');

                }
                if(container.classList.contains('d-none')) {

                    container.classList.remove('d-none');

                } else {
                    
                    container.classList.add('d-none');
                    //cont.classList.remove('d-none');
                }

            }; 
             
            $('.assit_present').click(function(){ window.location.href = 'dados_reuniao.php'; });

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

            // ======================== Trata a function valida()  ===============================
            $(document).ready(function() {
            
                $('#nome, .contagem').on('input', valida);

                $('.btn-calc').on('click', valida);

            });
            
            function valida() {
                
                var nome = document.getElementById('nome').value;
                var cont = parseInt(contagem.value);
                var isEmpty1 = (nome.length && cont);
                var isEmpty2 = (nome.length || cont);

                $('#sub').prop('disabled', !isEmpty1);
                
                isEmpty1 ? $('.btn_submit').addClass('btnsubmit') : $('.btn_submit').removeClass('btnsubmit');
                
                //console.log(cont);
                
            }
            //====================================================================================

        </script>
    </body>
</html>
