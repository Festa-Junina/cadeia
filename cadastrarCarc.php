<?php
require_once __DIR__."/vendor/autoload.php";
if(isset($_POST['submit'])){
    $carc = new Carcereiro($_POST['emailCarc']);
    $carc->setNomeCarc($_POST['nomeCarc']);
    $carc->setSenhaCarc($_POST['senhaCarc']);
    $carc->setTelCarc($_POST['telCarc']);
    $carc->save();
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
    <section>
        <div class="divTitulo">
            <h1 class="titulo">Registrar carcereiro</h1><br>
        </div>
    </section>
    <section class="formulario"> 
        <div class="divform">
            <form class="formCad" action="formCad.php" method="POST">
                <label for='email'>E-mail:</label><br>
                <input type='email' name='emailCarc' id='email' required><br>
                <label for='senha'>Senha:</label><br>
                <input type='password' name='senha' id='senha' required><br>
                <label for='telefone'>Senha:</label><br>
                <input type='int' name='telCarc' id='telCarc' required><br>
                </div>
                <div class="botaoCad">
                    <button name='botao' value='Cadastrar'>Cadastrar</button>
                </div>
            </form>
            <a href='index.php'>voltar ao inicio </a>
        </div>
    </section>
</body>
</html>

