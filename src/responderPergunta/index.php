<?php

require_once __DIR__ . "/../../vendor/autoload.php";

session_start();

if (!isset($_SESSION["idUsuario"]) && $_SESSION["funcao"] != "Carcereiro") {
    header("location: ../../login");
}

if (!isset($_GET["id"])) {
    header("location: ../listarDetentos");
}

use classes\Detento;
use classes\OrdemPrisao;

$detento = new Detento();
$detento->setIdOrdemPrisao($_GET['id']);

$ordemPrisao = OrdemPrisao::find($detento->getIdOrdemPrisao());

$detentoSelecionado = Detento::findByOrdemDePrisao($ordemPrisao->getIdOrdem());
$statusDetento = $detentoSelecionado->getIdStatusPrisao();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../visualizarDetento/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/globalStyles.css">
    <link rel="stylesheet" href="style.css">
    <title>Responder Pergunta</title>
</head>
<body>
<div class="header">
    <div class="logo">
        <a href="#">Responder Pergunta</a>
    </div>
    <div class="user">
        <p>Carcereiro</p>
        <span class="material-symbols-outlined">
                local_police
            </span>
        <div class="user-opt">
            <a href="#">Solturas</a>
            <a href="../login/logout.php">Sair</a>
        </div>
    </div>
</div>

<p class="tempo-restante">Tempo restante para responder a pergunta: <span id="timer">00:10</span></p>

<div class="area-responder-pergunta">
    <p class="nome-detento">Nome do detento: <?php echo $ordemPrisao->getNomeMeliante() ?></p>

    <div class="descricao-pergunta">
        <p class="nome-categoria">Categoria da pergunta</p>

        <p class="enunciado">Enunciado da pergunta enunciado da pergunta enunciado da pergunta enunciado da pergunta enunciado da pergunta enunciado da pergunta enunciado da pergunta enunciado da pergunta enunciado da pergunta enunciado da pergunta enunciado da pergunta enunciado da pergunta enunciado da pergunta enunciado da pergunta:</p>
    </div>

    <form action="resposta.php" method="post">
        <?php

        echo "<input name='idPergunta' value='1' type='hidden'>";
        echo "<input id='idDetento' name='idDetento' value='{$detentoSelecionado->getIdPrisao()}' type='hidden'>";

        ?>

        <div class="alternativas">
            <label>
                <input type="radio" name='resposta' value='A'>
                <span id="A">Alternativa A</span>
            </label>

            <label>
                <input type="radio" name='resposta' value='B'>
                <span id="B">Alternativa B</span>
            </label>

            <label>
                <input type="radio" name='resposta' value='C'>
                <span id="C">Alternativa C</span>
            </label>

            <label>
                <input type="radio" name='resposta' value='D'>
                <span id="D">Alternativa D</span>
            </label>
        </div>

        <input id="button" type="submit" value="Responder" name="button">
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script src="main.js"></script>
<script>
    $('.user').on("click", function () {
        $('.user-opt').toggleClass('displayed');
    });
</script>
</body>
</html>
