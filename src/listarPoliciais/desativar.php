<?php

require_once "../login/sessions/sessaoAdmin.php";

if (!isset($_GET["id"])) {
    header("location: ../listarPoliciais");
}

use classes\Usuario;

$policia = Usuario::find($_GET["id"]);

$policia->setAtivo(0);
$policia->save();

header("location: ../listarPoliciais");
