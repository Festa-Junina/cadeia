<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $carc = new Carcereiro($_POST['email'],$_POST['senha']);
    if($carc->authenticate()){
        header("location: restrita.php");
    }else{
        header("location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carcereiro</title>
</head>
<body>
    
</body>
</html>