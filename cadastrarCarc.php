<?php

if(isset($_POST['botao'])){
    require_once __DIR__."/src/Carcereiro.php";
    $carcereiro = new Carcereiro(1,$_POST['login'],$_POST['senha'],$_POST['nome'],$_POST['telefone'],$_POST['ativo']);
    $carcereiro->save();
    header("location: index.php");
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
        <form action="cadastrarCarc.php" method="POST">
                Nome: <input name='nome' type="text" required>
                <br>
                Email: <input name='login' type='email' required>
                <br>
                Senha: <input name='senha' type="password" required>
                <br>
                Telefone: <input name='telefone' type="int" required>
                <br>
                Ativo: <input name='ativo' type="int" required>
    </div>
        <div class="botaoCad">
        <input type='submit' name='botao'>
        </div>
        </form>
        <a href='index.php'>voltar ao inicio </a>
    </div>

</body>
</html>

