<?php 

    require 'dados_bd.php';

    $PDO = db_connect();

    $stmt = $PDO->prepare(" SELECT start_time, end_time, data FROM date_time");
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode(

        array(  
            
            'dataReuniao' => $data['data'],
            'diaSemana' => $data['semana'] ?? 'Domingo',
            'horario_1' => $data['start_time'] ?? 0,
            'horario_2' => $data['end_time'] ?? 0
            
        )
        
    );

        
        
?>