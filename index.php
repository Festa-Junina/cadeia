<?php
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/src/Policial.php";
$policiais = Policial::findall();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.login.css">
    <title>main policial</title>
</head>
<body>
    <article>
    <table class="table">
    <tr>
        <th>Nome</th>
        <th>Email</th>
    </tr>
    <?php
    foreach($policiais as $policial){
        echo "<tr>";
        echo "<td>{$policial->getNome()}</td>";
        echo "<td>{$policial->getemail()}</td>";
        echo "<td>
                <a href='formEdit.php?id={$policial->getIdPolicial()}'>Editar</a>
                <a href='excluir.php?id={$policial->getIdPolicial()}'>Excluir</a> 
             </td>";
        echo "</tr>";
    }
    ?>
</table>
    </article>
    <article>
            <div class='card'>
                <a class="link-cadastro" href='formPolicial.php'>Registrar policail</a>
            </div>
    </article>
</body>
</html>