<?php
require_once __DIR__."/src/Policial.php";
$policial = Policial::find($_GET['id_policial']);
$policial->delete();
header("location:index.php");