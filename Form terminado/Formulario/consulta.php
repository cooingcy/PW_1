<?php
session_start();
include_once('config.php');

/*if ($con->connect_errno) {
    echo "Falha ao conectar: " . $con->connect_error;
} else {
    echo "Conexão bem-sucedida!";*/

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultar Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="bg-dark" style="height: 940px;">
        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                    <nav class="navbar navbar-expand-lg border border-info border-3 border-opacity-50 rounded"
                        style="background-color: #ebebeb">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="index.php">Home</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="">Consulta</a>
                                    </li>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="row">
                    <div class="col">
                        <br>
                        <div class="col-lg-1 offset-lg-1 rounded" style="width: 900px;">
                            <div class="card border border-info border border-start-0 border border-3 rounded">
                                <div class="card-body" style="height: 250px; background-color: #878584;">
                                    <table class="table table-dark table-hover">
                                        <thead>
                                            <tr style="height: 50px;">
                                                <th scope="col">💠</th>
                                                <th scope="col" class="d-none d-md-table-cell">Nome</th>
                                                <th scope="col" class="d-none d-md-table-cell">Endereço</th>
                                                <th scope="col" class="d-none d-md-table-cell">Bairro</th>
                                                <th scope="col" class="d-none d-md-table-cell">Cep</th>
                                                <th scope="col" class="d-none d-md-table-cell">Cidade</th>
                                                <th scope="col" class="d-none d-md-table-cell">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <?php

                                                if (isset($_SESSION['msg'])) {
                                                    echo $_SESSION['msg'];
                                                    unset($_SESSION['msg']);
                                                }

                                                $querry_usus = "SELECT id, nome, endereco, bairro, cep, cidade, estado FROM clientes ORDER BY id DESC";
                                                $result_usuarios = $con->prepare($querry_usus);
                                                $result_usuarios->execute();
                                                echo "<form method='POST' action='editar.php'>";
                                                while ($row = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                                                    //var_dump($row);
                                                    extract($row);
                                                    echo "<input class='form-check-input' type='checkbox' name='clientes[$id]' value='$id'>";
                                                    echo "ID: $id <br>";
                                                    echo "<td>" . $row['nome'] . "</td>";
                                                    echo "<td>" . $row['endereco'] . "</td>";
                                                    echo "<td>" . $row['bairro'] . "</td>";
                                                    echo "<td>" . $row['cep'] . "</td>";
                                                    echo "<td>" . $row['cidade'] . "</td>";
                                                    echo "<td>" . $row['estado'] . "</td>";

                                                } /*elseif ($result) {
                                                   echo "<tr><td colspan='7'>Nenhum registro encontrado.</td></tr>";
                                               } else {
                                                   echo "Erro na consulta: " . $con->error;
                                               }*/
                                                echo "<div class='position-absolute bottom-0 start-0 opacity-75' style='margin-left: 150px; top: 190px;'><button type='submit' class='btn btn-light' name='atualizar'>Atualizar Dados</button></div>";

                                                echo "</form>";
                                                ?>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>null</td>
                                                <td>null</td>
                                                <td>null</td>
                                                <td>null</td>
                                                <td>null</td>
                                                <td>null</td>
                                            </tr>
                                            <div class="position-absolute bottom-0 start-0 opacity-75"
                                                style="margin-left: 15px; top: 190px;"><button type="submit"
                                                    name="excluir" class="btn btn-danger" href="excluir.php">Excluir
                                                    dados</button></div>
                                        </tbody>
                                    </table>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>