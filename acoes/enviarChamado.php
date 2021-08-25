<?php
    session_start();
    require("conexao.php");

    if(isset($_POST["id"]) && isset($_SESSION["usuario"]) && $_SESSION["usuario"][1]){
        $query = $conexao->prepare("UPDATE chamados SET Solicitacao = 'Finalizado' WHERE chamados.id = ?;");
        
        if($query->execute(array($_POST["id"]))){
            echo json_encode(array("erro" => 0));
        }else{
            echo json_encode(array("erro" => 1));
        }
    }else{
        echo json_encode(array("erro" => 1));
    }
?>