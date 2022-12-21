<?php

require_once "../login/sessions/sessaoAdmin.php";

if (!isset($_GET["id"])) {
    header("location: ../listarCarcereiros");
}

use classes\Usuario;

$carcereiro = Usuario::find($_GET["id"]);

$carcereiro->delete();

header("location: ../listarCarcereiros");
