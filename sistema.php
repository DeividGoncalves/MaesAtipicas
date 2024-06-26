<?php
     session_start();
    include_once('config.php');
    // print_r($_SESSION);
    if(!isset($_SESSION['nome']) && (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
         header('Location: login.php');
    }
    $logado = $_SESSION['nome'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        //$sql = "SELECT * FROM pacientes ORDER BY nome";
        $sql = "SELECT * FROM pacientes WHERE nome LIKE '%$data%' ORDER BY nome";
    }
     else
     {
         $sql = "SELECT * FROM pacientes ORDER BY nome DESC";
     }
     $result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Mães átipicas</title>
    <style>
        body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mães atipicas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
        <div class="d-flex">
            <a href="cadastroUsuario.php" class="btn btn-primary me-5">Cadastrar usuario</a>
        </div>
        <div class="d-flex">
            <a href="cadastroPaciente.php" class="btn btn-primary me-5">Cadastrar Paciente</a>
        </div>

    </nav>
    <br>
    <?php
        echo "<h3>Bem vindo(a) <u>$logado</u></h3>";
    ?>
    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Dt nascimento</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Diagnostico</th>
                    <th scope="col">tratamento</th>
                    <th scope="col">Neuro</th>
                    <th scope="col">PAC</th>
                    <th scope="col">Fila Especialidade</th>
                    <th scope="col">Fila APAE</th>
                    <th scope="col">Caps</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {

                        $idPacienteTeste = $user_data['idpacientes'];
                        echo "<tr>";
                        echo "<td>".substr($user_data['nome'], 0, 20)."</td>"; // Limita o nome a 20 caracteres
                        echo "<td>".substr($user_data['telefone'], 0, 10)."</td>"; // Limita o telefone a 10 caracteres
                        echo "<td>".substr($user_data['sexo'], 0, 1)."</td>"; // Limita o sexo a 1 caractere
                        echo "<td>".$user_data['datanascimento']."</td>"; // Não limita a data de nascimento
                        echo "<td>".substr($user_data['endereco'], 0, 30)."</td>"; // Limita o endereço a 30 caracteres
                        echo "<td>".substr($user_data['diagnostico'], 0, 40)."</td>"; // Limita o diagnóstico a 50 caracteres
                        echo "<td>".substr($user_data['tratamento'], 0, 40)."</td>"; // Limita o tratamento a 50 caracteres
                        echo "<td>".substr($user_data['precisaneuro'], 0, 1)."</td>"; // Não limita a coluna precisa neuro
                        echo "<td>".substr($user_data['precisapac'], 0, 1)."</td>"; // Não limita a coluna precisa pac
                        echo "<td>".substr($user_data['filaapae'], 0, 1)."</td>"; // Não limita a coluna fila apae
                        echo "<td>".substr($user_data['filacaps'], 0, 1)."</td>"; // Não limita a coluna fila apae

                         echo "<td>".$user_data['filaespecialidade']."</td>";
                        //echo "<td>".$user_data['filacaps']."</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='edit.php?idpacientes=$user_data[idpacientes]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            </a> 
                           
                            <a class='btn btn-sm btn-danger' href='deletepaciente.php?idpacientes=$user_data[idpacientes]'  title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>

                           
                            </td>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("change", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'sistema.php?search='+search.value;
    }
</script>
</html>