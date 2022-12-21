<?php
require_once "../login/sessions/sessaoCarcereiro.php";

if (!isset($_GET["idDetento"])) {
    header("location: ../listarDetentos");
}

use classes\Detento;

$detento = Detento::find($_GET["idDetento"]);

$statusDetento = $detento->getIdStatusPrisao();

if ($statusDetento == 2) {
    $proximoStatus = 3;
} elseif ($statusDetento == 4) {
    $proximoStatus = 5;
} elseif ($statusDetento == 6) {
    $proximoStatus = 8;
}

$detento->updateStatus($proximoStatus);

header("location: ../listarDetentos");