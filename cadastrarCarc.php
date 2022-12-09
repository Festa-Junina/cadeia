<?php

if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $carcereiro = new Carcereiro($_POST['emailCarc'],$_POST['nomeCarc'],$_POST['senhaCarc'],$_POST['telCarc']);
    $carcereiro->save();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="style.form.scss">
    <title>Registrar carcereiro</title>
</head>

<body>
<hr>
<h1>Página Cadastrar - Carcereiro</h1>
<hr>
    <div>
        <form action="formCad.php" method="POST">
                Nome: <input name='nomeCarc' type="text" required>
                <br>
                Email: <input name='emailCarc' type='email' required>
                <br>
                Senha: <input name='senhaCarc' type="password" required>
                <br>
                Telefone: <input name='telCarc' type="int" required>
                <br>
    </div>
        <div class="botaoCad">
        <input type='submit' name='botao'>
        </div>
        </form>
        <a href='index.php'>voltar ao inicio </a>
    </div>

</body>
</html>

