<?php
session_start();
ob_start();

include_once('config.php');

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados);

if(!empty($dados['cadastrar'])){

    foreach($dados['id'] as $chave => $id){
        /*echo "Chave: $chave <br>";
        echo "ID: " . $dados['id'][$chave] . "<br>";
        echo "Nome: " . $dados['nome'][$chave] . "<br>";
        echo "Endereço: " . $dados['endereco'][$chave] . "<br>";
        echo "Bairro: " . $dados['bairro'][$chave] . "<br>";
        echo "Cep: " . $dados['cep'][$chave] . "<br>";
        echo "Cidade: " . $dados['cidade'][$chave] . "<br>";
        echo "Estado: " . $dados['estado'][$chave] . "<br>";
        echo "<hr>";*/

        $querry_usuario = "UPDATE clientes SET nome=:nome, endereco=:endereco, bairro=:bairro,
                             cep=:cep, cidade=:cidade, estado=:estado
                             WHERE id=:id";
        $edit_u = $con->prepare($querry_usuario);
        $edit_u->bindParam(':id', $dados['id'][$chave]);
        $edit_u->bindParam(':nome', $dados['nome'][$chave]);
        $edit_u->bindParam(':endereco', $dados['endereco'][$chave]);
        $edit_u->bindParam(':bairro', $dados['bairro'][$chave]);
        $edit_u->bindParam(':cep', $dados['cep'][$chave]);
        $edit_u->bindParam(':cidade', $dados['cidade'][$chave]);
        $edit_u->bindParam(':estado', $dados['estado'][$chave]);

        $edit_u->execute();
    }
    $_SESSION['msg'] = "<p>Usuário editado com sucesso!</p>";

    header("Location: consulta.php");

}else{
    $_SESSION['msg'] = "<p> Erro Usuário não editado com sucesso, 
    tente novamente!</p>";

    header("Location: consulta.php");
}

?>