<?php
    require_once("../assets/utils/restrita.php");
    require_once("../../vendor/autoload.php");

    use classes\OrdemPrisao;

    if (isset($_POST['assumir'])) {
        var_dump($_POST['idOrdemPrisao']);
        
        header('Location: index.php');
    }