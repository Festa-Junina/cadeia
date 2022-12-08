<?php
require_once __DIR__ . "/../../vendor/autoload.php";

session_start();

if (!isset($_SESSION["idUsuario"]) && $_SESSION["funcao"] != "Carcereiro") {
    header("location: ../../login");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="../../globalStyles.css">
    <title>Ordens de Prisão</title>
</head>

<body>
<div class="container">
    <div class="header">
        <div class="logo">
            Detentos
        </div>
        <div class="user">
            <p>Carcereiro</p>
            <span class="material-symbols-outlined">
                    local_police
                </span>
            <div class="user-opt">
                <a href="#">Solturas (Coming soon)</a>
                <a href="../../login/logout.php">Sair</a>
            </div>
        </div>
    </div>

    <div class="main-content">

        <div class="order-list">

            <div class="order">
                <div class="order-content">
                    <h2>Reinaldo Manoel da Silva</h2>

                    <div class="tipo-status">
                        <div class="order-type">
                            <div class="ball" id="ball3"></div>
                            <p>Visitante</p>
                        </div>

                        <div class="questions-status">
                            <div class="question-1 errou"></div>
                            <div class="question-2 pode-responder"></div>
                            <div class="question-3"></div>
                        </div>
                    </div>

                    <a href="#tips3" rel="modal:open">
                        <p>&nbsp;Características</p>
                    </a>


                    <!-- Modal -->
                    <div id="tips3" class="modal">
                        <p>Caracterisicas do meliante aqui!</p>
                        <p>Caracterisicas do meliante aqui!</p>
                        <p>Caracterisicas do meliante aqui!</p>
                        <!-- <a href="#" rel="modal:close">Fechar</a> -->
                    </div>
                </div>

                <p style="text-align: right; font-size: 14px">Preso há X minutos...</p>
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
