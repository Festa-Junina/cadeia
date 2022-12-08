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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>main policial</title>
</head>

<body>
    <article>
        <div>
            <a class="link-cadastro" href='formPolicial.php'>Registrar policail</a>
        </div>
    </article>
    <article>
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>funcao</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($policiais as $policial){
                    echo "<tr>";
                    echo "<td>{$policial->getLogin()}</td>";
                    echo "<td>{$policial->getFuncao()}</td>";
                    echo "<td>{$policial->getStatus()}</td>";
                    echo "<td>
                            <a href='formEdit.php?id={$policial->getIdUsuario()}'>Editar</a>
                            <a href='excluir.php?id={$policial->getIdUsuario()}'>Excluir</a> 
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
    </article>
</body>
</html>