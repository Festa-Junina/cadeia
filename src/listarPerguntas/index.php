<?php
require_once __DIR__ . "/../../vendor/autoload.php";

echo "Listagem de perguntas<br><br><br>";

use classes\Pergunta;

var_dump(Pergunta::findall());
