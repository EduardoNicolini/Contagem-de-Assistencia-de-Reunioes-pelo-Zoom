<?php 

    require 'dados_bd.php';
    
    $PDO = db_connect();

    $sql = " SELECT * ,(SELECT SUM(quantidade) FROM assistencia where data = :data) total_pessoas
        FROM dados_zoom ORDER BY id DESC LIMIT 1
    ";

    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':data', $_POST["select_date"]);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode(
        array(  
            
            'total_remote'=> $data['total_pessoas'] ?? 0,
            'total_presential'=> $data['total_pessoas'] ?? 0,
            'total'=> $data['total_pessoas'] ?? 0,
            'idzoom' => $data['id_zoom'], 
            'senha' => $data['senha'], 
            'link' => $data['link']
            
        )
    );
                
?>
