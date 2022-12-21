<?php

require_once "../../vendor/autoload.php";

use classes\OrdemPrisao;
use db\MySQL;

session_start();
if(!isset($_SESSION['idTicket'])){
    header("location: validarTicket.php");
}

if (isset($_POST['submit'])) {

    $ticket = $_SESSION['ticket'];
    $ordemPrisao = new OrdemPrisao($_POST['nomeMeliante'], $_POST['descricaoMeliante'], $_POST['localVisto'], $_POST['nomeDenunciante'], $_POST['telefoneDenunciante']);

    $ordemPrisao->setIdTicket($_SESSION['idTicket']);

    $ordemPrisao->setIdTipoMeliante($_POST['tipoMeliante']);

    if (isset($_POST['turmaMeliante'])) {
        $ordemPrisao->setIdTurmaMeliante($_POST['turmaMeliante']);
    }

    $ordemPrisao->save();

    //mensagem de sucesso?
    header("location: ../../index.php?success=yes&ticket={$_SESSION['ticket']}");
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="styleEmitirOrdem.css">
    <link rel="stylesheet" href="../assets/styles/globalStyles.css">
    <title>Emitir Ordem de Prisão</title>

</head>

<body >
    <header class="header">
        <div class="container container-header">
            <h1>Emitir Ordem de Prisão</h1>
            <?php
                echo "<span>Ticket: {$_SESSION['ticket']}</span>";
            ?>
        </div>
    </header>
    <main class="main">
        <div class='container container-main'>
            <section class="section">
                <a href="../../index.php" class='links'>🡄 Voltar à tela inicial</a>
                <p>Preencha todos os campos para efetuar a ordem de prisão.</p>
            </section>
            
            <form action="emitirOrdem.php" method="post" class="form">
                <h2>Dados do Meliante</h2>
                <label for="nomeMeliante">Nome do Meliante:</label>
                <input type="text" name="nomeMeliante" id="nomeMeliante" placeholder="ex: João da Silva Morais" required>

                <label for="tipoMeliante">Tipo do Meliante:</label>
                <select name="tipoMeliante" id="tipoMeliante" required>
                    <option value="" disabled selected>Escolha um tipo</option>

                    <?php
                    $conexao = new MySQL();
                    $sql = "SELECT * FROM tipoMeliante";
                    $tiposMeliantes = $conexao->consulta($sql);
                    foreach ($tiposMeliantes as $tipo) {
                        echo "<option value='{$tipo['idTipoMeliante']}'> {$tipo['nome']} </option>";
                    }
                    ?>
                </select>

                <!-- SO ABRE SE FOR ALUNO -->
                <label for="turmaMeliante">Turma do Meliante: </label>
                <select name="turmaMeliante" required id="turmaMeliante">
                    <option value="" disabled selected>Escolha uma turma</option>

                    <?php
                    $conexao = new MySQL();
                    $sql = "SELECT * FROM turmaMeliante";
                    $turmaMeliantes = $conexao->consulta($sql);
                    foreach ($turmaMeliantes as $turma) {
                        echo "<option value='{$turma['idTurmaMeliante']}'> {$turma['nome']} </option>";
                    }
                    ?>

                </select>

                <label for="descricaoMeliante">Descrição do Meliante:</label>
                <textarea name="descricaoMeliante" id="descricaoMeliante" placeholder="Use esse espaço para descrever   características físicas do meliante" cols="30" rows="10" required></textarea>

                <label for="localVisto">Último local visto:</label>
                <input type="text" name="localVisto" id="localVisto" placeholder="ex: Em frete a praça principal" required>

                <h2>Dados do Denunciante</h2>
                <label for="nomeDenunciante">Seu nome:</label>
                <input type="text" name="nomeDenunciante" id="nomeDenunciante" placeholder="ex: Elías dos Anjos" required>

                <label for="telefoneDenunciante">Seu telefone:</label>
                <input type="tel" name="telefoneDenunciante" id="telefoneDenunciante" placeholder="ex: (51) 9 8047-4373" required>
                <div class="button-div">
                    <a href="../../index.php?success=no" class="button button-modifica">Cancelar</a>
                    <input type="submit" name="submit" value="Enviar" class="button">
                </div>
            </form>
        </div>
    </main>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
    <script>
        //Mascara TEL
        $(document).ready(function() {
            $('#telefoneDenunciante').mask('(99) 99999-9999');
        });
    </script>
</body>

</html>