<?php
require_once __DIR__."/vendor/autoload.php";
$carcereiros = Carcereiro::findall();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Carcereiro</title>
</head>
<body>

<table>
    <tr>
        <td>Nome</td>
        <td>E-mail</td>
        <td>Opções</td>
    </tr>
    <?php
    foreach($carcereiros as $carcereiros){
        echo "<tr>";
        echo "<td>{$carcereiros->getNome()}</td>";
        echo "<td>{$carcereiros->getEmail()}</td>";
        echo "<td>
                <a href='editCarc.php?id={$carcereiros->getId()}'>Editar</a>
                <a href='excluirCarc.php?id={$carcereiros->getId()}'>Excluir</a> 
             </td>";
        echo "</tr>";
    }
    ?>
</table>
<a href='formCad.php'>Adicionar Carcereiro</a>
</body>
</html>