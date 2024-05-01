<?php

$nome = "";
$telefone = "";
$sexo = "";
$datanascimento = "";
$endereco = "";
$diagnostico = "";
$tratamento = "";
$filaespecialidade = "";
$filaapae = "";
$precisaneuro = "";
$filacaps = "";
$precisapac = "";

    include_once('config.php');

    if(!empty($_GET['idpacientes']))
    {
        $idpacientes = $_GET['idpacientes'];
        $sqlSelect = "SELECT * FROM pacientes WHERE idpacientes=$idpacientes";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $telefone = $user_data['telefone'];
                $sexo = $user_data['sexo'];
                $datanascimento = $user_data['datanascimento'];
                $endereco = $user_data['endereco'];
                $diagnostico = $user_data['diagnostico'];
                $tratamento = $user_data['tratamento'];
                $filaespecialidade = $user_data['filaespecialidade'];
                $filaapae = $user_data['filaapae'];
                $precisaneuro = $user_data['precisaneuro'];
                $filacaps = $user_data['filacaps'];
                $precisapac = $user_data['precisapac'];
                
            }

        }
        else
        {
            header('Location: sistema.php');
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 60%;
        }
        fieldset{
            justify-content: center;
            border: 1px solid dodgerblue;
            
        }
        legend{
            border: 2px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }

        .teste {
            float: left;
            width: 46%; /* Ajuste a largura conforme necessário */
            margin-right:4.0%; /* Espaço entre as divs */
    }
    </style>
</head>
<body>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Editar dados Paciente</b></legend>
                <br>
                <div class="teste">
                    <fieldset>
                        <div class="inputBox">
                            <input type="text" name="idpacientes" id="idpacientes" class="inputUser" required value="<?php echo $idpacientes?>">
                            <label for="nome" class="labelInput">IDPacientes</label>
                        </div>
                        <br>
                        <div class="inputBox">
                            <input type="text" name="nome" id="nome" class="inputUser" required value="<?php echo $nome?>">
                            <label for="nome" class="labelInput">Nome completo</label>
                        </div>
                        <br>
                        <div class="inputBox">
                            <input type="tel" name="telefone" id="telefone" class="inputUser" required value="<?php echo $telefone?>">
                            <label for="telefone" class="labelInput">Telefone</label>
                        </div>
                        <p>Sexo:</p>
                        <input type="radio" id="feminino" name="genero" value="feminino" <?php echo ($sexo == "feminino") ? "checked" : null; ?> required>
                        <label for="feminino">Feminino</label>
                        
                        <input type="radio" id="masculino" name="genero" value="masculino" <?php echo ($sexo == "masculino") ? "checked" : null; ?> required>
                        <label for="masculino">Masculino</label>
                        <br><br>

                        <label for="datanascimento"><b>Data de Nascimento:</b></label>
                        <input type="date" name="datanascimento" id="datanascimento" required value = "<?php echo $datanascimento?>">
                        <br><br>
                        <div class="inputBox">
                            <input type="text" name="endereco" id="endereco" class="inputUser" required value="<?php echo $endereco?>">
                            <label for="endereco" class="labelInput">Endereço completo</label>
                        </div>
                        <br>
                        <div class="inputBox">
                            <input type="text" name="diagnostico" id="diagnostico" class="inputUser" required value="<?php echo $diagnostico?>">
                            <label for="diagnostico" class="labelInput">diagnóstico</label>
                        </div>

                        <br>
                        <div class="inputBox">
                            <input type="text" name="tratamento" id="tratamento" class="inputUser" required value="<?php echo $tratamento?>"> 
                            <label for="nome" class="labelInput">Tratamento</label>
                        </div>
                        <br>
                    </fieldset>
                </div>

                <div class="teste">
                    <fieldset>
                        
                        <p>Precisa passar pelo Neurologista?</p>
                        <input type="radio" id="precisaneuro" name="precisaneuro" value="sim" required <?php echo ($precisaneuro == "s") ? "checked" : null; ?> >
                        <label for="precisaneuroS">Sim</label>
                        <input type="radio" id="precisaneuro" name="precisaneuro" value="nao" required <?php echo ($precisaneuro == "n") ? "checked" : null; ?> >
                        <label for="precisaneuroN">Não</label>

                     

                        <br> <p>Precisa de avaliação da PAC?</p>
                        <input type="radio" id="precisapacS" name="precisapac" value="sim" required <?php echo ($precisapac == "s") ? "checked" : null; ?>>
                        <label for="precisapacS">Sim</label>
                        <input type="radio" id="precisapacN" name="precisapac" value="nao" required <?php echo ($precisapac == "n") ? "checked" : null; ?>>
                        <label for="precisapacN">Não</label>

                        <br><br>
                        <div class="inputBox">
                            <input type="text" name="filaEspecialidade" id="filaEspecialidade" class="inputUser" required value="<?php echo $filaespecialidade?>">
                            <label for="filaEspecialidade" class="labelInput">fila de alguma especialidade? Qual?</label>
                        </div>
                       
                        <br> 
                        <p>Está em fila de espera na APAE</p>
                        <input type="radio" id="filaapaeS" name="filaapae" value="sim" required <?php echo ($filaapae == "s") ? "checked" : null; ?> >
                        <label for="filaapaeS">Sim</label>
                        <input type="radio" id="filaapaeN" name="filaapae" value="nao" required <?php echo ($filaapae == "n") ? "checked" : null; ?> >
                        <label for="filaapaeN">Não</label>

                        <br> <p>Está em fila de espera no CAPS?</p>
                        <input type="radio" id="filacapsS" name="filacaps" value="sim" required <?php echo ($filacaps == "s") ? "checked" : null; ?>>
                        <label for="filacapsS">Sim</label>
                        <input type="radio" id="filacapsN" name="filacaps" value="nao" required <?php echo ($filacaps == "n") ? "checked" : null; ?>>
                        <label for="filacapsN">Não</label>
                        <br>
                    </fieldset>
                    <br>
                </div>
                <input type="submit" name="update" id="submit">
            </fieldset>
                <br><br>
        </form>
    </div>
</body>
</html>