<?php
require_once __DIR__."/vendor/autoload.php";
$policiais = Policial::findall();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Página de Policial</title>
</head>
<body>
<table class="table">
    <tr>
        <th>Nome</th>
        <th>Email</th>
    </tr>
    <?php
    foreach($policiais as $policial){
        echo "<tr>";
        echo "<td>{$policial->getNome()}</td>";
        echo "<td>{$policial->getEmail()}</td>";
        echo "<td>
                <a href='formEdit.php?id={$policial->getId()}'>Editar</a>
                <a href='excluir.php?id={$policial->getId()}'>Excluir</a> 
             </td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>






