<?php
    require_once("../login/sessions/sessaoPolicial.php");

    use classes\OrdemPrisao;

    if (isset($_POST['assumir'])) {

        $ordem = OrdemPrisao::find($_POST['idOrdemPrisao']);
        $ordem->setAssumidaPor($_SESSION['idUsuario']);
        $ordem->save();
        header('Location: index.php');
    }
