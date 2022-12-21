<?php
// session_start();
// if(!isset($_SESSION['idUsuario'])){
//     header("location:index.php");
// }
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $Pergunta = new Pergunta($_POST['enunciado'],$_POST['alternativa1'],$_POST['alternativa2'],$_POST['alternativa3'],$_POST['resposta'],$_POST['categoria']);
    $Pergunta->save();
    header("location: ListagemPergunta.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiciona Pergunta</title>
    <link rel="stylesheet" href="editPergunta.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <div class="header">
                <div class="logo">
                    <a href="ListagemPergunta.php">Perguntas</a>
                </div>
                <div class="user">
                    <p>Admin</p>
                </div>
            </div>
            </div>
    <form action='formCadPergunta.php' method='POST'>
        Categoria:
        <Select name="categoria">
            <Option value="default">Selecione uma Opção</Option>
            <option name="categoria" value="0">Matematica</option>
            <option name="categoria" value="1">Portugues</option>
            <option name="categoria" value="2">Biologia</option>
            <option name="categoria" value="3">Física</option>
            <option name="categoria" value="4">História</option>
            <option name="categoria" value="5">Inglês</option>
            <option name="categoria" value="6">Química</option>
            <option name="categoria" value="7">Informática</option>
            <option name="categoria" value="8">Lógica</option>
            <option name="categoria" value="9">Filosofia</option>
            <option name="categoria" value="10">Sociologia</option>
            <option name="categoria" value="11">Geografia</option>
            <option name="categoria" value="12">IFRS</option>
        </Select>
        <br>
        Enunciado: <input name='enunciado' type='text' required>
        <br>
        Alternativa 1: <input name='alternativa1' type='text' required>
        <br>
        Alternativa 2: <input name='alternativa2' type='text' required>
        <br>
        Alternativa 3: <input name='alternativa3' type='text' required>
        <br>
        Resposta: <input name='resposta' type='text' required>
        <br>
        <input type='submit' name='botao'>
    </form>
    <a href='sair.php'>Sair</a>
</body>
</html>

