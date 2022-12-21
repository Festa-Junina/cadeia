<?php
require_once "../login/sessions/sessaoCarcereiro.php";

if (!isset($_POST["idDetento"])) {
    header("location: ../listarDetentos");
}

use classes\Detento;
use classes\OrdemPrisao;
use classes\Pergunta;

$detento = Detento::find($_POST["idDetento"]);
$ordemPrisaoDetento = OrdemPrisao::find($detento->getIdOrdemPrisao());

$pergunta = Pergunta::find($_POST["idPergunta"]);
$respostaDadaPeloDetento = $_POST["resposta"];

$statusDetento = $detento->getIdStatusPrisao();

if ($respostaDadaPeloDetento == $pergunta->getAlternativaCorreta()) {
    // O idPrisao 7 corresponde a uma pergunta respondida corretamente;
    $detento->updateStatus(7);
} else {
    if ($statusDetento == 2) {
        $proximoStatus = 3;
    } elseif ($statusDetento == 4) {
        $proximoStatus = 5;
    } elseif ($statusDetento == 6) {
        $proximoStatus = 8;
    }

    $detento->updateStatus($proximoStatus);
}

header("location: ../listarDetentos");
