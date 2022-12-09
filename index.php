<?php

require_once __DIR__."/vendor/autoload.php";
$carcereiros = Carcereiro::findal();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carcereiro</title>
</head>
<body>
    <div class="formulario">
    <table>
    <tr>
        <th>Login</th>
        <th>Telefone</th>
        <th>Nome</th>
        <th class="linha"><img src="img/ops.png" alt="">OPÇÕES</th>
    </tr>
    <?php
    foreach($carcereiros as $carcereiro){
        echo "<tr>";
        echo "<td>{$carcereiro->getLogin()}</td>";
        echo "<td>{$carcereiro->getTelefone()}</td>";
        echo "<td>{$carcereiro->getNome()}</td>";
        echo "<td>
                <a href='formEdit.php?id={$carcereiro->getIdUsuario()}'>Editar</a>
                <a href='excluir.php?id={$carcereiro->getIdUsuario()}'>Excluir</a> 
            </td>";
    }
    ?>
</table>
            <div class="botao">
                <a href="CadastrarCarc.php">Cadastrar</a>
            </div>

            <div class="botao">
                <a href="editCarc.php">Editar CARC teste</a>
            </div> 
</body>
</html>


