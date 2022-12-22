<?php
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/src/Carcereiro.php";
$carc = Carcereiro::find($_GET['id']);
$carc->admitir();
header("location: listarCarc.php");