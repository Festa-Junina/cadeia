<?php
require_once __DIR__ . "/../../vendor/autoload.php";

session_start();

if (!isset($_SESSION["idUsuario"]) && $_SESSION["funcao"] != "Carcereiro") {
    header("location: ../../login");
}
use classes\Detento;
use classes\OrdemPrisao;
$detento = Detento::find(1);
// $detento::find(1);
echo $detento->getIdPrisao();
$ordemPrisao = OrdemPrisao::find($detento->getIdPrisao());
var_dump($ordemPrisao);
// $detento->setIdPrisao($detento->getIdPrisao());
// var_dump($detento);
die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Detento João da Silva</title>
</head>
<body>
<div class="header">
        <div class="logo">
            Detentos
        </div>
        <div class="user">
            <p>Carcereiro</p>
            <span class="material-symbols-outlined">
                    local_police
                </span>
            <div class="user-opt">
                <a href="#">Solturas</a>
                <a href="../../login/logout.php">Sair</a>
            </div>
        </div>
    </div>
    <div class="visualizar-detento-container">
        <div class="visualizar-detento-area">
            <div class="visualizar-detento-nome">
                <h1>João da Silva</h1>
            </div>
        </div>
    </div>
</body>
</html>