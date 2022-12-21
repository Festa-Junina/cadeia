<?php
require_once "../login/sessions/sessaoCarcereiro.php";

if (!isset($_GET["idDetento"])) {
    header("location: ../listarDetentos");
    exit();
}

use classes\Detento;

$detento = Detento::find($_GET["idDetento"]);

if ($detento->liberar()) {
    header("location: ../listarDetentos");
}
