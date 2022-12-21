<?php

require_once "../login/sessions/sessaoAdmin.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../listarOrdensdePrisao/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/globalStyles.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/534/534102.png" type="image/png">
    <title>Painel Administrador</title>
</head>

<body>
<div class="container">
    <div class="header">
        <div class="logo">
            Página Inicial
        </div>
        <div class="user">
            <p>Administrador</p>
            <span class="material-symbols-outlined">
                    local_police
                </span>
            <div class="user-opt">
                <a href="../login/logout.php">Sair</a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="order-list">
            <div class="order">
                <div class="order-content">
                    <h2>Cadastro de Perguntas</h2>
                </div>

                <a href="../listarPerguntas">
                    <div class="order-btn">
                        <h2>Acessar</h2>
                    </div>
                </a>
            </div>

            <div class="order">
                <div class="order-content">
                    <h2>Cadastro de Categorias para as Perguntas</h2>
                </div>

                <a href="../listarCategorias">
                    <div class="order-btn">
                        <h2>Acessar</h2>
                    </div>
                </a>
            </div>

            <div class="order">
                <div class="order-content">
                    <h2>Cadastro de Policiais</h2>
                </div>

                <a href="../listarPoliciais">
                    <div class="order-btn">
                        <h2>Acessar</h2>
                    </div>
                </a>
            </div>

            <div class="order">
                <div class="order-content">
                    <h2>Cadastro de Carcereiros</h2>
                </div>

                <a href="../listarCarcereiros">
                    <div class="order-btn">
                        <h2>Acessar</h2>
                    </div>
                </a>
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
