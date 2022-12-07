<?php
    use db\MySQL;

    require_once("../../vendor/autoload.php");
    

    // $ordens = OrdemPrisao::findall();
    
    // ini_set('display_errors',1);
    // error_reporting(E_ALL);

    
    $conexao = new MySQL();
    $sql = "SELECT * FROM ordemPrisao";
    $resultados = $conexao->consulta($sql);
    
    // var_dump($resultados);
?>