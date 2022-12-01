<?php
require_once __DIR__."/src/Policial.php";
$policial = Policial::find($_GET['id']);
$policial->delete();
header("location:index.php");