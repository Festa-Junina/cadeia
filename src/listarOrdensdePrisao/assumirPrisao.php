<?php
    require_once("../assets/utils/restrita.php");
    require_once("../../vendor/autoload.php");

    use classes\OrdemPrisao;

    if (isset($_POST['assumir'])) {
        $ordem = OrdemPrisao::find($_POST['idOrdemPrisao']);
        $ordem->setAssumidaPor(1);
        $ordem->save();

        header('Location: index.php');
    }