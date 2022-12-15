<?php
if(isset($_GET['id'])){
    require_once __DIR__."/src/Carcereiro.php";
    $carcereiro = Carcereiro::find($_GET['id']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/src/Carcereiro.php";
    $carcereiro = new Carcereiro(1,$_POST['login'],$_POST['senha'],$_POST['nome'],$_POST['telefone'],$_POST['ativo']);
    $carcereiro->setIdUsuario($_POST['id']);
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
    <title>Editar Carcereiro</title>
</head>
<body>
    <section>   
        <div class="divTitulo">
            <h1 class="titulo">Editar Carcereiro</h1><br>
        </div>
    </section>


    <section class="formulario"> 
        <div class="divform">
            <form class="formCad" action="editCarc.php" method="POST">
                <?php
                    echo "<label for='email'>E-mail:</label><br>";
                    echo "<input name='login' id='login' value='{$carcereiro->getLogin()}' type='text' required>";
                    echo "<br>";
                    echo "<label for='telefone'>telefone</label><br>";
                    echo "<input name='telefone' id='telefone' value='{$carcereiro->getTelefone()}' type='text' required>";
                    echo "<br>";
                    echo "<label for='nome'>Nome:</label><br>";
                    echo "<input name='nome' id='nome' value='{$carcereiro->getNome()}' type='text' required>";
                    echo "<br>";
                    echo "<label for='ativo'>Ativo:</label><br>";
                    echo "<input name='ativo' id='ativo' value='{$carcereiro->getAtivo()}' type='text' required>";
                    echo "<input type='hidden' name='senha' value={$carcereiro->getSenha()} id='senha' required><br>";
                    echo "<input name='id' value={$carcereiro->getIdUsuario()} type='hidden'>";
                ?>
                <div class="botaoCad">
                    <button name='botao' value='Cadastrar'>Editar</button>
                </div>
            </form>
            <a href='index.php'>voltar ao inicio </a>
        </div>
    </section>
    </form>
</body>
</html>