<?php
    require_once("../assets/utils/restrita.php");
    require_once("../../vendor/autoload.php");
    use classes\OrdemPrisao;
    use classes\Prisao;

    if (isset($_POST['confirm'])) {
        // var_dump($_POST['idOrdemPrisao']);
        $ordem = OrdemPrisao::find($_POST['idOrdemPrisao']);
        // $ordem->setPresoPor($_SESSION['idUsuario']);
        $ordem->setPresoPor(1);
        // if ($ordem->getIdTurmaMeliante()!== null) {
        //     $ordem->setIdTurmaMeliante(null);
        // }
        var_dump($ordem);
        $ordem->save();
        $prisao = new Prisao();
        $prisao->setIdOrdemPrisao($_POST['idOrdemPrisao']);
        $prisao->setIdStatusPrisao(0);
        $prisao->setQuantidadePerguntasRespondidas(0);
        $prisao->save();
        // header('Location: index.php');
    }