<?php
require_once "../login/sessions/sessaoPolicial.php";

echo "Listagem de perguntas<br><br><br>";

use classes\Pergunta;

var_dump(Pergunta::findall());
