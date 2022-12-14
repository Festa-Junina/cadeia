<?php
    require_once("../assets/utils/restrita.php");
    require_once("../../vendor/autoload.php");
    use classes\OrdemPrisao;
    use classes\Prisao;

    if (isset($_POST['confirmar'])) {
        // var_dump($_POST['idOrdemPrisao']);
        // $ordem->setPresoPor($_SESSION['idUsuario']);
        $ordem = OrdemPrisao::find($_POST['idOrdemPrisao']);
        $ordem->setPresoPor(1);
        $ordem->save(); 
        var_dump($ordem);

        // $prisao = new Prisao();
        // $prisao->setIdOrdemPrisao($_POST['idOrdemPrisao']);
        // $prisao->setIdStatusPrisao(0);
        // $prisao->setQuantidadePerguntasRespondidas(0);
        // $prisao->save();
        // header('Location: index.php');
    }