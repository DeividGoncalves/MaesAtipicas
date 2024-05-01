<?php

    if(!empty($_GET['idpacientes']))
    {
        include_once('config.php');

        $idpacientes = $_GET['idpacientes'];

        $sqlSelect = "SELECT * FROM pacientes WHERE idpacientes=$idpacientes";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM pacientes WHERE idpacientes=$idpacientes";
            $resultDelete = $conexao->query($sqlDelete);
        }
        header('Location: sistema.php');
    }
   
?>