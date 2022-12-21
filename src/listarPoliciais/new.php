<?php

require_once "../login/sessions/sessaoAdmin.php";

use classes\Usuario;

if (isset($_POST["button"])) {
    if (Usuario::existeLogin($_POST["login"])) {
        echo "<script>alert('Já existe um usuário com o Login informado.');</script>";
    } else {
        $policia = new Usuario();
        $policia->constructorCreate(
            $_POST["idFuncao"],
            $_POST["login"],
            $_POST["senha"],
            $_POST["nome"],
            $_POST["telefone"],
            boolval($_POST["ativo"])
        );
        $policia->save();
        header("location: ../listarPoliciais");
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../admin/styles.css">
    <link rel="stylesheet" href="../listarOrdensdePrisao/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/globalStyles.css">
    <link rel="stylesheet" href="styles.css">
    <title>Policiais</title>
</head>

<body>
<div class="container">
    <div class="header">
        <a href="../listarPoliciais">
            <div class="logo">
                Policiais
            </div>
        </a>
        <div class="user">
            <p>Administrador</p>
            <span class="material-symbols-outlined">
                    local_police
                </span>
            <div class="user-opt">
                <a href="../login/logout.php">Sair</a>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        <h2>Novo policial</h2>
        <form method="post" action="new.php">
            <input type='hidden' name='idFuncao' value='<?php echo Usuario::findIdFuncaoPeloNomeDaFuncao("Policial") ?>'>
            <label>
                <p>Nome</p>
                <input type="text" name="nome" required>
            </label>

            <label>
                <p>Login</p>
                <input type="text" name="login" required>
            </label>
            
            <label>
                <p>Senha</p>
                <input type="password" name="senha" placeholder="Insira uma nova senha..." required>
            </label>

            <label>
                <p>Telefone</p>
                <input type="tel" name="telefone" id='tel' value="" maxlength="15" minlength="15" required onChange="contactSeparators()">
            </label>

            <label>
                <p>Ativo</p>
                <select name="ativo" required>
                    <option selected value='1'>Sim</option>
                    <option value='0'>Não</option>
                </select>
            </label>

            <input type="submit" name="button" value="Salvar">
        </form>
        <a href='../listarPoliciais'>Voltar</a>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script>
    $('.user').on("click", function () {
        $('.user-opt').toggleClass('displayed');
    });
</script>

<script>
    function mascara(o, f) {
        v_obj = o;
        v_fun = f;

        setTimeout("execmascara()", 1);
    }
    
    function execmascara() {
        v_obj.value = v_fun(v_obj.value);
    }

    function mtel(v) {
        v = v.replace(/\D/g,"");
        v = v.replace(/^(\d{2})(\d)/g,"($1) $2");
        v = v.replace(/(\d)(\d{4})$/,"$1-$2");

        return v;
    }

    function id(el) {
        return document.getElementById(el);
    }

    window.onload = function() {
        id('tel').onkeyup = function() {
            mascara(this, mtel);
        }
    }
</script>
</body>

</html>
