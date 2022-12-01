<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $carc = new Carcereiro($_POST['email'],$_POST['senha']);
    if($carc->authenticate()){
        header("location: listarCarc.php");
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
    <div class="formulario">
        <form action="index.php" method='post'>
                <label for='email'>E-mail:</label>
                <br>
                <input type='email' name='email' id='email' required>
                <br>
                <label for='senha'>Senha:</label>
                <br>
                <input type='password' name='senha' id='senha' required>
                <br>
                <input type='submit' name='botao' value='Entrar'>
                <br>
            </form>
            <div class="botao">
                <a href="formCad.php">Cadastrar</a>
            </div>
</body>
</html>