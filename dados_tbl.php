<?php 

    require 'dados_bd.php';

    if(isset($_POST["select_date"])){   
          
        $searsh_date = isset($_POST['select_date']) ? $_POST['select_date'] : '';

        $PDO = db_connect();
        
        $stmt = $PDO->prepare(" SELECT id, nome, quantidade FROM assistencia WHERE data = :data ORDER BY id DESC ");
        $stmt->bindParam(':data', $searsh_date, PDO::PARAM_STR);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dados as $data){
            
            echo "

                <tr> 
                    <td class='collum-table pl-4' >".$data['nome']."</td>
                    <td class='collum-table text-center'>".$data['quantidade']."</td>
                    <td class='button-table'>
                        <button type='submit' class='btn btn-success mr-3' name='editar' id=".$data["id"]." onclick='editar(this)' >Editar</button>
                        <button type='submit' class='btn btn-danger mr-1' name='apagar' id=".$data["id"]." onclick='apagar(this)' >Exluir</button>
                    </td>
                </tr>
                
            ";

        }
    
    }
    
    if(isset($_POST["delete_dados"])){

        $PDO = db_connect();
        
        $stmt = $PDO->prepare(" DELETE FROM assistencia where id = :id ");
        $stmt->bindParam(':id', $_POST["delete_dados"], PDO::PARAM_INT);
        $stmt->execute();

    }
    
?>