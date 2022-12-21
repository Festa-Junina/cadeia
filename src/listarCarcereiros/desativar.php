<?php

require_once "../login/sessions/sessaoAdmin.php";

if (!isset($_GET["id"])) {
    header("location: ../listarCarcereiros");
}

use classes\Usuario;

$carcereiro = Usuario::find($_GET["id"]);

$carcereiro->setAtivo(0);
$carcereiro->save();

header("location: ../listarCarcereiros");
