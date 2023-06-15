<?php
require_once("../login/sessions/sessaoPolicial.php");

use classes\OrdemPrisao;
use classes\Prisao;

if (isset($_POST['confirmar'])) {
    $ordem = OrdemPrisao::find($_POST['idOrdemPrisao']);
    $ordem->setPresoPor($_SESSION['idUsuario']);
    $ordem->setIdStatusOrdem(2);
    $ordem->save();

    $prisao = new Prisao();
    $prisao->setIdOrdemPrisao($_POST['idOrdemPrisao']);
    $prisao->setIdStatusPrisao(1);
    $prisao->setQuantidadePerguntasRespondidas(0);
    $prisao->save();

    header('Location: index.php');
}
