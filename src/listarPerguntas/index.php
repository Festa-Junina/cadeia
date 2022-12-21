<?php

require_once "../login/sessions/sessaoAdmin.php";

use classes\Pergunta;
use classes\Categoria;

$perguntas = Pergunta::findall();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../admin/styles.css">
    <link rel="stylesheet" href="../listarOrdensdePrisao/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/globalStyles.css">
    <link rel="stylesheet" href="../listarPoliciais/styles.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/534/534102.png" type="image/png">
    <style>
        .card-question {
            width: 100%;
        }
    </style>
    <title>Perguntas</title>
</head>

<body>
<div class="container">
    <div class="header">
        <a href="../listarPerguntas">
            <div class="logo">
                Perguntas
            </div>
        </a>
        <div class="user">
            <p>Administrador</p>
            <span class="material-symbols-outlined">
                    local_police
                </span>
            <div class="user-opt">
                <a href="../admin">Página Inicial</a>
                <a href="../login/logout.php">Sair</a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class='new-button-area'>
            <a href='new.php'>Nova Pergunta</a>
        </div>

        <div class="questions">
            <?php

            if (count($perguntas) > 0) {
                foreach ($perguntas as $pergunta) {
                    echo '<div class="card-question">';

                    echo "<a href='view.php?id={$pergunta->getIdPergunta()}' class='view'></a>";

                    $categoria = Categoria::findNomeCategoriaPeloId($pergunta->getIdCategoria());
                    echo "<p class='category'>{$categoria}</p>";

                    echo "<p class='description'>{$pergunta->getEnunciado()}</p>";

                    echo '<div class="actions-question">';
                        echo "<a class='edit-question' href='edit.php?id={$pergunta->getIdPergunta()}'>Editar</a>";
                        echo "<a class='remove-question' href='delete.php?id={$pergunta->getIdPergunta()}'>Excluir</a>";
                    echo '</div>';

                    echo '</div>';
                }
            } else {
                echo "<h2 style='color: #090909'>Sem perguntas cadastradas...</h2>";
            }

            ?>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script>
    $('.user').on("click", function () {
        $('.user-opt').toggleClass('displayed');
    });
</script>
</body>

</html>
