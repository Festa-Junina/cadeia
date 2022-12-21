<?php

require_once "../login/sessions/sessaoAdmin.php";

use classes\Pergunta;

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
            <div class="card-question">
                <p class="category">Categoria</p>

                <p class="description">Enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado enunciado.</p>

                <div class="actions-question">
                    <a class="edit-question" href="edit.php?id=1">Editar</a>
                    <a class="remove-question" href="">Excluir</a>
                </div>
            </div>
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
