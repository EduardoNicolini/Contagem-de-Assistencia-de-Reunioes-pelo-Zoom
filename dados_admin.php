<?php 

    require 'dados_bd.php';

    $PDO = db_connect();
    
    $sql = " SELECT * , 
        (SELECT SUM(quantidade) FROM assistencia where data = current_date()) quantidade
        FROM dados_zoom ORDER BY id DESC LIMIT 1
    ";
     
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode(
        array(
            'total_pessoas'=> $data['total_pessoas'] ?? 0,
            'idzoom' => $data['id_zoom'], 
            'senha' => $data['senha'], 
            'link' => $data['link']
        )
    );
       
?>
