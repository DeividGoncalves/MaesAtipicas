<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {

        echo "está setado";
        $idpacientes = $_POST['idpacientes'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $datanascimento = $_POST['datanascimento'];
        $endereco = $_POST['endereco'];
        $diagnostico = $_POST['diagnostico'];
        $tratamento = $_POST['tratamento'];
        $precisaneuro = $_POST['precisaneuro'];
        $precisapac = $_POST['precisapac'];
        $filaapae = $_POST['filaapae'];
        $filaespecialidade = $_POST['filaEspecialidade'];
        $filacaps = $_POST['filacaps'];
        


        $sqlInsert = "UPDATE  pacientes SET nome = '$nome', telefone = '$telefone', sexo = '$sexo', datanascimento = '$datanascimento', endereco = '$endereco',
            diagnostico = '$diagnostico', tratamento = '$tratamento', precisaneuro = '$precisaneuro', precisapac = '$precisapac', filaapae = '$filaapae',
             filaespecialidade = '$filaespecialidade', filacaps = '$filacaps' WHERE idpacientes='$idpacientes'";


        $result = $conexao->query($sqlInsert);
        print_r($result);
    }else{
        echo "não está setado";

    }
     header('Location: sistema.php');

?>