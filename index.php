<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="globalStyles.css">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>

<?php

    if(isset($_GET['success'])){
        $passou = $_GET['success'];
        if($passou == "yes"){
            $ticket = $_GET['ticket'];
            echo "<div class='blur' id='blur'></div>
            <div class='modal' id='modal'>
                <h1>Sucesso!</h1>
                <p>Sua ordem de prisão foi emitida com sucesso, lembre-se do seu numero de ticket <mark>$ticket</mark>, pois    com ele você pode acompanhar o andamento da ordem.</p>
                <button class='button' id='closeModal'>Fechar</button>
            </div>";
        }else{
            echo "<div class='blur' id='blur'></div>
            <div class='modal' id='modal'>
                <h1>Cancelado</h1>
                <p>A sua operação foi cancelado com sucesso, o seu ticket não foi utilizado</p>
                <button class='button' id='closeModal'>Fechar</button>
            </div>";
        }
    }
    ?>

    <header class="header">
        <div class="container container-header">
            <a href="SaibaMais.html" class="button">Saiba Mais</a>
            <a href="src/login/index.php" class="button">Restrito</a>
        </div>
    </header>
    <main class="main container">
        <h1>Olá, seja bem vindo(a)!</h1>
        <img src="cadeia.png" alt="ilustração cadeia" class="cadeia-img">
        <p class="p-centro">
            Para prender alguém na cadeia preencha o código do ticket, avance para a próxima etapa e faça a ordem de prisão.
        </p>
        <a href="src/emitirOrdem/validarTicket.php" class="button">Emitir Nova Ordem de Prisão</a>
        <a href="src/visualizarStatusOrdem/visuOrdem.php" class="button">Acompanhar Ordem Já Existente</a>
    </main>
    <script src="script.js"></script>

</body>
</html>