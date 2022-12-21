<?php
require_once "../login/sessions/sessaoAdmin.php";

$conn = mysqli_connect("localhost","aluno","aluno","cadeia-app");

if(!$conn){
    die('Connection Failed'. mysqli_connect_error());
}
