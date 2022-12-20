<?php
require_once __DIR__ . "/../../vendor/autoload.php";

session_start();

if (!isset($_SESSION["idUsuario"]) && $_SESSION["funcao"] != "Carcereiro") {
    header("location: ../../login");
}
use classes\Detento;
use classes\OrdemPrisao;
use classes\TipoMeliante;
use classes\Turma;
$detento = new Detento();
if (isset($_GET['idDetento'])) {
    $detento->setIdOrdemPrisao($_GET['idDetento']);
}
// echo $detento->getIdPrisao();
$ordemPrisao = OrdemPrisao::find($detento->getIdOrdemPrisao());
// $turma = Turma::find($ordemPrisao->getIdTurmaMeliante())->getTurma();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
                <a href="../../login/logout.php">Sair</a>
            </div>
        </div>
    </div>
    <div class="visualizar-detento-container">
        <div class="visualizar-detento-area">
            <div class="visualizar-detento-nome">
                <h1><?php echo $ordemPrisao->getNomeMeliante() ?></h1>
            </div>
            <div class="visualizar-detento-descricao">
                <p><strong>Descrição: </strong><?php echo $ordemPrisao->getDescricaoMeliante() ?></p>
                <p><strong>Tipo do meliante: </strong><?php echo TipoMeliante::find($ordemPrisao->getIdTipoMeliante())->getNome();?></p>
                <?php
                if (is_null($ordemPrisao->getIdTurmaMeliante())) {
                    echo "<p><strong>Turma do meliante:</strong> O detento não possui uma turma pois não estuda no IFRS!</p>";
                } else {
                    echo "<p><strong>Turma do meliante:</strong>".Turma::find($ordemPrisao->getIdTurmaMeliante())->getTurma()."</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>