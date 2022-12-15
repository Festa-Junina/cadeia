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
    <link rel="stylesheet" href="css/style.css">
    <title>Editar Carcereiro</title>
</head>
<body>
<div class="container">   
    <div class="title-carcereiro">
        <hr>
            <h1>Editar Carcereiro</h1>
        <hr>
    </div>
    
    <div class="box-edit-carc">
     
        <div class="div-form">
            <form class="formCad" action="editCarc.php" method="POST">
                <?php
                    echo "
                    <div class='box-edit'>
                    <div class='centro-edit'>
                    <div class='edit-carc'>
                        <label for='nome'>Nome:</label>
                        <input name='nome' id='nome' value='{$carcereiro->getNome()}' type='text' required>

                        <label for='email'>E-mail:</label>
                        <input name='login' id='login' value='{$carcereiro->getLogin()}' type='text' required>
                    
                        <label for='telefone'>telefone</label>
                        <input name='telefone' id='telefone' value='{$carcereiro->getTelefone()}' type='text' required>
                    
                        <label for='ativo'>Ativo:</label>
                        <input name='ativo' id='ativo' value='{$carcereiro->getAtivo()}' type='text' required>
                    <input type='hidden' name='senha' value={$carcereiro->getSenha()} id='senha' required>
                    <input name='id' value={$carcereiro->getIdUsuario()} type='hidden'>
                    <div class='botaoCad'>
                    <button name='botao' value='Cadastrar'>Salvar</button>
                    <a href='index.php'>Cancelar</a>
                </div>
                    </div>
                    </div>
                    </div>";
                ?>
            </form>
        </form>
    </div>
</div>
</div> 
</body>
</html>