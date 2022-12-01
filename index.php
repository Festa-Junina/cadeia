<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $c = new Carcereiro($_POST['email'],$_POST['senha']);
    if($c->authenticate()){
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
    <div class="formulario1">
        <form action="index.php" method='post'>
                <label for='email'>E-mail:</label>
                <br>
                <input type='email' name='email' id='email' required>
                <br>
                <label for='password'>Password:</label>
                <br>
                <input type='password' name='password' id='password' required>
                <br>
                <input type='submit' name='botao' value='Sign in'>
                <br>
            </form>
            <div class="botao">
                <a href="formCad.php">Sign Up</a>
            </div>
</body>
</html>