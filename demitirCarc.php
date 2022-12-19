<?php
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/src/Carcereiro.php";
$carc = Carcereiro::find($_GET['id']);
$carc->demitir();
header("location: index.php");