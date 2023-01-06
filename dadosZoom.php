<?php 
    require 'dados_bd.php';
  
    $PDO = db_connect();

    $sql = " SELECT * FROM dados_zoom ORDER BY id DESC LIMIT 1 ";

    $stmt = $PDO->prepare($sql);
    $stmt->execute();

    $dadosZoom = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($dadosZoom);
 
?>