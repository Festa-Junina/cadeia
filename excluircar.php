<?php
require_once __DIR__."/vendor/autoload.php";
$carc = Carcereiro::find($_GET['codCarc']);
$carc->delete();
header("location:index.php");