<?php
require_once __DIR__ . "/../../vendor/autoload.php";

session_start();

if (!isset($_SESSION["idUsuario"]) && $_SESSION["funcao"] != "Carcereiro") {
    header("location: ../login");
}

use classes\Detento;
use classes\OrdemPrisao;

$detentos = Detento::findall();
foreach ($detentos as $detento) {
    Detento::ativaPergunta($detento->getIdOrdemPrisao());
}

$detentosAtualizados = Detento::findall();
$ordens = array();

foreach ($detentos as $detento) {
    $ordens[] = array(
        OrdemPrisao::find($detento->getIdOrdemPrisao()),
        $detento
    );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="30">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/globalStyles.css">
    <title>Ordens de Prisão</title>
</head>

<body>
<div class="container">
    <div class="header">
        <div class="logo">
            Detentos
        </div>
        <div class="user">
            <p>Carcereiro</p>
            <span class="material-symbols-outlined">
                    local_police
                </span>
            <div class="user-opt">
                <a href="#">Solturas</a>
                <a href="../login/logout.php">Sair</a>
            </div>
        </div>
    </div>

    <div class="main-content">

        <div class="order-list">

            <?php

            $numero_detento = 0;
            foreach ($ordens as $ordem) {
                $numero_detento += 1;
                $test = Detento::ativaPergunta($ordem[1]->getIdOrdemPrisao());

                echo "<div class=\"order\">";
                    echo "<div class=\"order-content\">";

                    echo "<a class=\"nome-detento\" href=\"../visualizarDetento/index.php?idDetento={$ordem[0]->getIdOrdem()}\"><h2>{$ordem[0]->getNomeMeliante()}</h2></a>";

                    echo "<div class=\"tipo-status\">";
                    echo "<div class=\"order-type\">";

                    // Tipos de detentos:
                    // id 0 - Aluno;
                    // id 1 - Servidor;
                    // id 2 - Visitante;
                    $cor_tipo_detento = "ball1";
                    $tipo_detento = "Aluno";

                    if ($ordem[0]->getIdTipoMeliante() == 1) {
                        $cor_tipo_detento = "ball2";
                        $tipo_detento = "Servidor";
                    } elseif ($ordem[0]->getIdTipoMeliante() == 2) {
                        $cor_tipo_detento = "ball3";
                        $tipo_detento = "Visitante";
                    }

                    echo "<div class=\"ball\" id=\"{$cor_tipo_detento}\"></div>";
                    echo "<p>{$tipo_detento}</p>";
                    echo "</div>";

                    // Tipos de status da prisão (que maluquice isso aqui kkkkkkkkkk[cada k uma lágrima]);
                    // id 0 - Ativo
                    // id 1 - Aguardando Pergunta 1
                    // id 2 - Aguardando Resposta 1
                    // id 3 - Aguardando Pergunta 2
                    // id 4 - Aguardando Resposta 2
                    // id 5 - Aguardando Pergunta 3
                    // id 6 - Aguardando Resposta 3
                    // id 7 - Respondeu Corretamente
                    $status_p1 = "";
                    $status_p2 = "";
                    $status_p3 = "";

                    if ($ordem[1]->getIdStatusPrisao() == 2) {
                        $status_p1 = "pode-responder";
                    }
                    elseif ($ordem[1]->getIdStatusPrisao() == 3) {
                        $status_p1 = "errou";
                    }
                    elseif ($ordem[1]->getIdStatusPrisao() == 4) {
                        $status_p1 = "errou";
                        $status_p2 = "pode-responder";
                    }
                    elseif ($ordem[1]->getIdStatusPrisao() == 5) {
                        $status_p1 = "errou";
                        $status_p2 = "errou";
                    }
                    elseif ($ordem[1]->getIdStatusPrisao() == 6) {
                        $status_p1 = "errou";
                        $status_p2 = "errou";
                        $status_p3 = "pode-responder";
                    }
                    elseif ($ordem[1]->getIdStatusPrisao() == 7) {
                        if ($ordem[1]->getQuantidadePerguntasRespondidas() == 1) {
                            $status_p1 = "acertou";
                        }
                        elseif ($ordem[1]->getQuantidadePerguntasRespondidas() == 2) {
                            $status_p1 = "errou";
                            $status_p2 = "acertou";
                        }
                        elseif ($ordem[1]->getQuantidadePerguntasRespondidas() == 3) {
                            $status_p1 = "errou";
                            $status_p2 = "errou";
                            $status_p3 = "acertou";
                        }
                    }

                    echo "<div class=\"questions-status\">";
                        echo "<div class=\"question-1 {$status_p1}\"></div>";
                        echo "<div class=\"question-2 {$status_p2}\"></div>";
                        echo "<div class=\"question-3 {$status_p3}\"></div>";
                    echo "</div>";

                    echo "</div>";

                    echo "<a href=\"#tips{$numero_detento}\" rel=\"modal:open\"><p>&nbsp;Características</p></a>";

                    echo "<div id=\"tips{$numero_detento}\" class=\"modal\">";
                        echo "<p>{$ordem[0]->getDescricaoMeliante()}</p>";
                    echo "</div>";


                    if (
                        $status_p1 == "pode-responder" ||
                        $status_p2 == "pode-responder" ||
                        $status_p3 == "pode-responder"
                    ) {
                        echo "<div class=\"order-btn\">";
                        echo "<h2>Responder</h2>";
                        echo "</div>";
                    }

                    if (
                        $status_p1 == "acertou" ||
                        $status_p2 == "acertou" ||
                        $status_p3 == "acertou"
                    ) {
                        echo "<div class=\"order-btn\">";
                        echo "<h2>Liberar</h2>";
                        echo "</div>";
                    }

                    // Tempo preso;
                    date_default_timezone_set("America/Sao_Paulo");
                    $today = strtotime(date("Y-m-d H:i:s"));
                    $prison = strtotime($ordem[1]->getHoraPrisao());
                    $diff = $today - $prison;

                    $minutes = round(abs($diff / 60), 0);
                    echo "</div>";
                    echo "<p style=\"text-align: right; font-size: 14px\">Preso há {$minutes} minutos</p>";

                echo "</div>";
            }

            ?>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script>
    $('.user').on("click", function () {
        $('.user-opt').toggleClass('displayed');
    });
</script>
</body>

</html>
