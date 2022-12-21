<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

session_start();

if (!isset($_SESSION["idUsuario"]) && $_SESSION["funcao"] != "Carcereiro") {
    header("location: ../login");
}

if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 30*60)) {
    // A última solicitação foi há mais de 30 minutos
    session_unset();     // Variável para o tempo de execução
    session_destroy();   // Destruir os dados da sessão no armazenamento
}

// Atualizar o registro de data e hora da última atividade
$_SESSION['LAST_ACTIVITY'] = time();
