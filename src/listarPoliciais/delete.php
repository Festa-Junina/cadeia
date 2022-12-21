<?php

require_once "../login/sessions/sessaoAdmin.php";

if (!isset($_GET["id"])) {
    header("location: ../listarPoliciais");
}

use classes\Usuario;

$policia = Usuario::find($_GET["id"]);

$policia->delete();

header("location: ../listarPoliciais");
