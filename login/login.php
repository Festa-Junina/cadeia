<?php

require_once __DIR__ . "/../vendor/autoload.php";

use classes\Usuario;

if (isset($_POST["button"])) {
    $user = new Usuario();
    $user->constructLogin($_POST["login"], $_POST["password"]);
    
    if ($user->authenticate()) {

        if ($_SESSION["funcao"] == "Carcereiro") {
            header("location: ../src/listarDetentos");
        }
        elseif ($_SESSION["funcao"] == "Policial") {
            header("location: ../src/listarOrdensdePrisao");
        }
        elseif ($_SESSION["funcao"] == "Administrador") {
            header("location: index.php");
        }

    } else {
        header("location: index.php");
    }
}