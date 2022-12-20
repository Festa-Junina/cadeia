<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

session_start();

if (!isset($_SESSION["idUsuario"]) && $_SESSION["funcao"] != "Policial") {
    header("location: ../login");
}
