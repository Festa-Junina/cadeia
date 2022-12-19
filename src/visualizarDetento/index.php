<?php
require_once __DIR__ . "/../../vendor/autoload.php";

session_start();

if (!isset($_SESSION["idUsuario"]) && $_SESSION["funcao"] != "Carcereiro") {
    header("location: ../../login");
}

use classes\Detento;
use classes\OrdemPrisao;

$detento = new Detento();
if (isset($_GET['idDetento'])) {
    $detento->setIdOrdemPrisao($_GET['idDetento']);
}

$ordemPrisao = OrdemPrisao::find($detento->getIdOrdemPrisao());

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
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/globalStyles.css">
    <title>Detento <?php echo $ordemPrisao->getNomeMeliante() ?></title>
</head>
<body>
<div class="header">
        <div class="logo">
            <a href="../listarDetentos/">Detentos</a>
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
    <div class="visualizar-detento-container">
        <div class="visualizar-detento-area">
            <div class="visualizar-detento-nome">
                <h1><?php echo $ordemPrisao->getNomeMeliante() ?></h1>
            </div>
            <div class="visualizar-detento-descricao">
                <h2><?php echo $ordemPrisao->getDescricaoMeliante() ?></h2>
            </div>

            <div class="botoes-acoes-detento">
                <a href="" class="liberar">Liberar</a>
                <a href="" class="liberar">Responder pergunta</a>
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