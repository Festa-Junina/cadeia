<?php

require_once "../login/sessions/sessaoAdmin.php";

if (!isset($_GET["id"])) {
    header("location: ../listarPerguntas");
}

use classes\Pergunta;

$pergunta = Pergunta::find($_GET["id"]);

$pergunta->delete();

header("location: ../listarPerguntas");
