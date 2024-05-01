<?php
    session_start();
    //  print_r($_REQUEST);
     if(isset($_POST['submit'])){

     }
    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['senha']))
    {
        // Acessa
         include_once('config.php');
         $nome = $_POST['nome'];
         $senha = $_POST['senha'];



         $sql = "SELECT * FROM users WHERE nome = '$nome' and senha = '$senha'";

         $result = $conexao->query($sql);



        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['nome']);
            unset($_SESSION['senha']);
            echo "<script>
            alert('Email ou senha incorretos');
            window.location.href = 'home.php'
            </script>";
        }
        else
        {
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
             header('Location: sistema.php');
        }
    }
     else
     {
        echo "<script>
            alert('Email ou senha incorretos');
            window.location.href = 'home.php'
            </script>";
    }
   
?>