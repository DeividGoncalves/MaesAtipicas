<?php

    if(!empty($_GET['idusers']))
    {
        include_once('config.php');

        $idusers = $_GET['idusers'];

        $sqlSelect = "SELECT * FROM users WHERE idusers=$idusers";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM users WHERE idusers=$idusers";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: sistema.php');
   
?>