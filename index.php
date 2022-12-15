<?php
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/src/Carcereiro.php";
$carcereiros = Carcereiro::findall();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Listar Carcereiros</title>
</head>
<body>
    
<hr>
<h1>Listagem dos Carcereiros</h1>
<hr>

<table>
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Login</th>
        <th class="linha"><img src="icons/ops.png" alt="">OPÇÕES</th>
    </tr>
    <?php
    foreach($carcereiros as $carcereiro){
        echo "<tr>";
        echo "<td>{$carcereiro->getNome()}</td>";
        echo "<td>{$carcereiro->getTelefone()}</td>";
        echo "<td>{$carcereiro->getLogin()}</td>";
        echo "<td>
        <a href='editCarc.php?id={$carcereiro->getIdUsuario()}'><img src='icons/edita.png' alt=''>Editar</a>
        <a href='excluirCarc.php?id={$carcereiro->getIdUsuario()}'><img src='icons/lixo.png' alt=''>Excluir</a> 
    </td>";
        echo "</tr>";
    }
    ?>
</table>


    <div class="links" >
        <div class="add">
            <a href="cadastrarCarc.php"><img src="icons/add.png" alt="">Cadastrar Carcereiro</a>
        </div>
</div>
</body>
</html>