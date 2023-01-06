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

    // Usando operadores ternarios para simplificar o codigo. 

    /* 
        Se: (? mesmo que if) a expressão $data['total_pessoas'] for maior que 0 insere o valor na frente do ? na variavel $participants.
        Caso o valor de $data['total_pessoas'] seja nulo ou vazio (: mesmo que else) insere o valor a frente, no caso 0
        Ficaroa assim: ( $participants = $data['total_pessoas'] > 0 ? $data['total_pessoas'] : 0; )
        Outra forma.
        A expressão $data['total_pessoas'] é avaliada para o valor 0 a frente do ?? se $data['total_pessoas'] for null e insere o valor no array 'total_pessoas'
        Do contrário será o valor da expressão $data['total_pessoas']
        Ou pode ser desta forma ( $participants = $data['total_pessoas'] ?? 0; ) passando o valor para uma variavel;
        
    */
    echo json_encode(
        array(
            'total_pessoas'=> $data['total_pessoas'] ?? 0,
            'idzoom' => $data['id_zoom'], 
            'senha' => $data['senha'], 
            'link' => $data['link']
        )
    );
       
    
?>