<?php
    require_once("../assets/utils/restrita.php");
    require_once("../../vendor/autoload.php");

    use classes\OrdemPrisao;
    use classes\Prisao;

    if (isset($_POST['confirmar'])) {
        $ordem = OrdemPrisao::find($_POST['idOrdemPrisao']);
        $ordem->setPresoPor(1);
        $ordem->setIdStatusOrdem(2);
        $ordem->save(); 
        
        $prisao = new Prisao();
        $prisao->setIdOrdemPrisao($_POST['idOrdemPrisao']);
        $prisao->setIdStatusPrisao(0);
        $prisao->setQuantidadePerguntasRespondidas(0);
        $prisao->save();

        header('Location: index.php');
    }