<?php
if(isset($_GET['id'])){
    require_once __DIR__."/src/Policial.php";
    $policial = Policial::find($_GET['id']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/src/Policial.php";
    $policial = new Policial($_POST['login'],$_POST['senha'],$_POST['status'],$_POST['funcao']);
    $policial->setIdUsuario($_POST['id']);
    $policial->save();
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
    <title>Edita policial</title>
</head>
<body>
    <form action='formEdit.php' method='POST'>
        <?php
            echo "Titulo: <input name='login' value='{$policial->getLogin()}' type='text' required>";
            echo "<br>";
            echo "Autora: <input name='senha' type='password' required>";
            echo "<br>";
            echo "Status: 
            <select name='status' id='status'> 
                <option value='Ativo'>Ativo</option>
                <option value='Inativo'>Inativo</option>
            </select>";
            echo "Status: 
            <select name='funcao' id='funcao'> 
                <option value='Policial'>Policial</option>
            </select>";
            echo "<br>";
            echo "<input name='id' value={$policial->getIdUsuario()} type='hidden'>";
        ?>
        <br>
        <input type='submit' name='botao'>
    </form>
</body>
</html>

