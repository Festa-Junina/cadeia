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
    <link rel="stylesheet" href="css/style_carcereiro.css">
    <title>Cadastrar Carcereiro</title>
</head>

<body>
<div class="container">
    <div class="title-carcereiro">
            <h1>Cadastrar Carcereiro</h1>
    </div>
    <div class="box-cad-carc">
        <div class="div-form">
            <form action="cadastrarCarc.php" method="POST">
            <div class='box-edit'>
                    <div class='centro-edit'>
                    <div class='edit-carc'>
                        Nome: <input name='nome' type="text" required>
                        Email: <input name='login' type='email' required>
                        Senha: <input name='senha' type="password" required>
                        Telefone: <input name='telefone' type="tel" maxlength="14" data-js="phone" required>
                        Status: <select name="ativo">
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                        <br>
                    <div class="botaoCad">
                        <input type='submit' value="Cadastrar" name='botao'>
                        <a href='index.php'>Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<script>
    const formato = {
phone (value) {
  return value
    .replace(/\D/g, '')
    .replace(/(\d{2})(\d)/, '($1)$2')
    .replace(/(\d{4})(\d)/, '$1-$2')
    .replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')
    .replace(/(-\d{4})\d+?$/, '$1')
}
}
document.querySelectorAll('input').forEach(($input) => {
const field = $input.dataset.js
$input.addEventListener('input', (e) => {
  e.target.value = formato[field](e.target.value)
}, false)
})
</script>  
</body>
</html>