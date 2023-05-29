<?php

session_start();
ob_start();

include_once('config.php');

$dado = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//var_dump($dado);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <a href="consulta.php">Consultar</a><br>
    <?php
    


    if (!empty($dado['clientes'])) {
        $valor_user = implode(", ", $dado['clientes']);
        //var_dump($valor_user);
    
        $querry_usuarios = "SELECT id, nome, endereco, bairro, cep, cidade, estado 
                        FROM clientes 
                        WHERE id IN ($valor_user)";

        $result_usuarios = $con->prepare($querry_usuarios);
        $result_usuarios->execute();


        echo "<h1>Editar Usuario</h1>";

        echo "<form method='POST' action='processa.php'>";

        while ($row = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($row);
            extract($row);
            echo "<input lass='form-check-input' type='hidden' name='id[]' value='$id'>";
            echo "<input lass='form-check-input' type='text' name='nome[]' value='$nome'><br><br>";
            echo "<input lass='form-check-input' type='text' name='endereco[]' value='$endereco'><br><br>";
            echo "<input lass='form-check-input' type='text' name='bairro[]' value='$bairro'><br><br>";
            echo "<input lass='form-check-input' type='text' name='cep[]' value='$cep'><br><br>";
            echo "<input lass='form-check-input' type='text' name='cidade[]' value='$cidade'><br><br>";
            echo "<input lass='form-check-input' type='text' name='estado[]' value='$estado'><br><br>";
        }

        echo "<div class='mb-5'>
    <input  name='cadastrar' type='submit'>";

        echo "</form>";

    } else {
        $_SESSION['msg'] = "<p> Erro Usuário não editado com sucesso, 
    tente novamente!</p>";

        header("Location: consulta.php");
    }
    ?>
</body>

</html>