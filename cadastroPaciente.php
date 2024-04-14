<?php

    if(isset($_POST['submit']))
    {
        // print_r('Nome: ' . $_POST['nome']);
        // print_r('<br>');

        //  print_r('Telefone: ' . $_POST['telefone']);
        //  print_r('<br>');

        //  print_r('Sexo: ' . $_POST['genero']);
        //  print_r('<br>');
        //  print_r('Data de nascimento: ' . $_POST['datanascimento']);

        //  print_r('<br>');
        //  print_r('Endereço: ' . $_POST['endereco']);

        //  print_r('<br>');
        //  print_r('tratamento: ' . $_POST['tratamento']);

        //  print_r('<br>');
        //  print_r('filaEspecialidade: ' . $_POST['filaEspecialidade']);

        //  print_r('<br>');
        //  print_r('precisaNeuro: ' . $_POST['precisaNeuro']);

        //  print_r('<br>');
        //  print_r('diagnostico: ' . $_POST['diagnostico']);

        //  print_r('<br>');
        //  print_r('filaApae: ' . $_POST['filaApae']);

        //  print_r('<br>');
        //  print_r('filaCaps: ' . $_POST['filaCaps']);
         
        include_once('config.php');

        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $datanascimento = $_POST['datanascimento'];
        $endereco = $_POST['endereco'];
        $diagnostico = $_POST['diagnostico'];
        $tratamento = $_POST['tratamento'];
        $precisaneuro = $_POST['precisaNeuro'];
        $precisapac = $_POST['precisaPac'];
        $filaapae = $_POST['filaApae'];
        $filaespecialidade = $_POST['filaEspecialidade'];
        $filacaps = $_POST['filaCaps'];


       $result = mysqli_query($conexao, "INSERT INTO pacientes(nome, telefone, sexo, datanascimento, endereco, diagnostico, tratamento, precisaneuro, precisapac, filaapae, filaespecialidade, filacaps) 
       VALUES ('$nome','$telefone','$sexo','$datanascimento','$endereco','$diagnostico','$tratamento','$precisaneuro','$precisapac','$filaapae','$filaespecialidade','$filacaps')");
        

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
            border: 3px solid dodgerblue;
            
        }
        legend{
            border: 1px solid dodgerblue;
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
    <a href="home.php">Voltar</a>
    <div class="box">
        <form action="cadastroPaciente.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Pacientes</b></legend>
                <br>
                <div class="teste">
                    <fieldset>
                        <div class="inputBox">
                            <input type="text" name="nome" id="nome" class="inputUser" required>
                            <label for="nome" class="labelInput">Nome completo</label>
                        </div>
                        <br>
                        <div class="inputBox">
                            <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                            <label for="telefone" class="labelInput">Telefone</label>
                        </div>
                        <p>Sexo:</p>
                        <input type="radio" id="feminino" name="genero" value="feminino" required>
                        <label for="feminino">Feminino</label>
                        
                        <input type="radio" id="masculino" name="genero" value="masculino" required>
                        <label for="masculino">Masculino</label>
                        <br><br>

                        <label for="datanascimento"><b>Data de Nascimento:</b></label>
                        <input type="date" name="datanascimento" id="datanascimento" required>
                        <br><br>
                        <div class="inputBox">
                            <input type="text" name="endereco" id="endereco" class="inputUser" required>
                            <label for="endereco" class="labelInput">Endereço completo</label>
                        </div>
                        <br>
                        <div class="inputBox">
                            <input type="text" name="diagnostico" id="diagnostico" class="inputUser" required>
                            <label for="diagnostico" class="labelInput">diagnóstico</label>
                        </div>

                        <br>
                        <div class="inputBox">
                            <input type="text" name="tratamento" id="tratamento" class="inputUser" required>
                            <label for="nome" class="labelInput">Tratamento</label>
                        </div>
                        <br>
                    </fieldset>
                </div>

                <div class="teste">
                    <fieldset>
                        
                        <p>Precisa passar pelo Neurologista?</p>
                        <input type="radio" id="precisaNeuro" name="precisaNeuro" value="sim" required>
                        <label for="precisaNeuroS">Sim</label>
                        <input type="radio" id="precisaNeuro" name="precisaNeuro" value="nao" required>
                        <label for="precisaNeuroN">Não</label>

                     

                        <br> <p>Precisa de avaliação da PAC?</p>
                        <input type="radio" id="precisaPacS" name="precisaPac" value="sim" required>
                        <label for="precisaPacS">Sim</label>
                        <input type="radio" id="precisaPacN" name="precisaPac" value="nao" required>
                        <label for="precisaPacN">Não</label>

                        <br><br>
                        <div class="inputBox">
                            <input type="text" name="filaEspecialidade" id="filaEspecialidade" class="inputUser" required>
                            <label for="filaEspecialidade" class="labelInput">fila de alguma especialidades? Qual?</label>
                        </div>
                       
                        <br> 
                        <p>Está em fila de espera na APAE</p>
                        <input type="radio" id="filaApaeS" name="filaApae" value="sim" required>
                        <label for="filaApaeS">Sim</label>
                        <input type="radio" id="filaApaeN" name="filaApae" value="nao" required>
                        <label for="filaApaeN">Não</label>

                        <br> <p>Está em fila de espera no CAPS?</p>
                        <input type="radio" id="filaCapsS" name="filaCaps" value="sim" required>
                        <label for="filaCapsS">Sim</label>
                        <input type="radio" id="filaCapsN" name="filaCaps" value="nao" required>
                        <label for="filaCapsN">Não</label>
                        <br>
                    </fieldset>
                    <br>
                </div>
                <input type="submit" name="submit" id="submit">
            </fieldset>
                <br><br>
        </form>
    </div>
</body>
</html>