<?php
if(isset($_GET['id'])){
    require_once __DIR__."/src/Carcereiro.php";
    $carcereiro = Carcereiro::find($_GET['id']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/src/Carcereiro.php";
    $carcereiro = new Carcereiro($_POST['login'],$_POST['senha'],$_POST['status'],$_POST['funcao']);
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
        <br>
    <section class="formulario"> 
        <div class="divform">
            <form class="formCad" action="editCarc.php" method="POST">
                <?php
                    echo "<label for='email'>E-mail:</label><br>";
                    echo "<input name='login' id='login' value='{$carcereiro->getLogin()}' type='text' required>";
                    echo "<br>";
                    echo "<input name='id' value={$carcereiro->getIdUsuario()} type='hidden'>";
                ?>
                <label for='senha'>Senha:</label><br>
                <input type='password' name='senha' id='senha' required><br>
                <div class="selects">
                    <label for="funcao">Função:</label><br>
                    <select name="funcao" id="funcao">
                        <option value="Carcereiro">Carcereiro</option>
                    </select><br>
                    <label for="status">Status:</label><br>
                    <select name="status" id="status">
                        <option value="Ativo">Ativo</option>
                    </select><br>
                </div>
                <div class="botaoCad">
                    <button name='botao' value='Cadastrar'>Cadastrar</button>
                </div>
            </form>
            <a href='index.php'>voltar ao inicio </a>
        </div>
    </section>
    </form>
</body>
</html>