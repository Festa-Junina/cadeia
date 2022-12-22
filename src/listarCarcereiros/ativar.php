<?php

require_once "../login/sessions/sessaoAdmin.php";

if (!isset($_GET["id"])) {
    header("location: ../listarCarcereiros");
}

use classes\Usuario;

$carc = Carcereiro::find($_GET['id']);
$carc->admitir();
header("location: index.php");