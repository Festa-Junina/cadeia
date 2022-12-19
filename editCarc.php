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
    <link rel="stylesheet" href="css/style_carcereiro.css">
    <title>Editar Carcereiro</title>
</head>
<body>
<div class="container">   
    <div class="title-carcereiro">
            <h1>Editar Carcereiro</h1>
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
                        <input name='telefone' id='telefone' value='{$carcereiro->getTelefone()}' type='tel' maxlength='14' data-js='phone' required>

                        <label for='ativo'>Status:</label>
                        ";
                        if ($carcereiro->getAtivo() == 1){
                            echo "<select id='ativo' name='ativo' required>
                                    <option value='1'>Ativo</option>
                                    <option value='0'>Inativo</option>
                                    </select>";
                        }else {
                            echo "<select id='ativo' name='ativo' required>
                                    <option value='0'>Inativo</option>
                                    <option value='1'>Ativo</option>
                                    </select>";
                        }
                        echo "
                    <br>
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