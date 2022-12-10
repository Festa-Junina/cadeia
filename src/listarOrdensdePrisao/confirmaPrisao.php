<?php
    require_once("../assets/utils/restrita.php");
    require_once("../../vendor/autoload.php");

    use classes\Prisao;

    if (isset($_POST['confirm'])) {
        var_dump($_POST['idOrdemPrisao']);
        $prisao = new Prisao();
        $prisao->setIdOrdemPrisao($_POST['idOrdemPrisao']);
        $prisao->setIdStatusPrisao(0);
        $prisao->setQuantidadePerguntasRespondidas(0);
        $prisao->save();
        header('Location: index.php');
    }