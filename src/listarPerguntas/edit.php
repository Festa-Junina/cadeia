<?php

require_once "../login/sessions/sessaoAdmin.php";

if (!isset($_GET["id"])) {
    header("location: ../listarPerguntas");
}

use classes\Pergunta;

$pergunta = Pergunta::find($_GET["id"]);
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
    <link rel="stylesheet" href="../listarPoliciais/styles.css">
    <link rel="stylesheet" href="styles.css">
    <title>Perguntas</title>
</head>

<body>
<div class="container">
    <div class="header">
        <a href="../listarPerguntas">
            <div class="logo">
                Perguntas
            </div>
        </a>
        <div class="user">
            <p>Administrador</p>
            <span class="material-symbols-outlined">
                    local_police
                </span>
            <div class="user-opt">
                <a href="../admin">Página Inicial</a>
                <a href="../login/logout.php">Sair</a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <h2>Editar Pergunta</h2>
        <div class="questions">
            <form method="post" action="edit.php" class="card-question">
                <label>
                    <p>Categoria</p>
                    <select name="categoria" class="categories">
                        <option selected value=""></option>
                    </select>
                </label>

                <label>
                    <p>Enunciado</p>
                    <textarea name="enunciado" rows="10" class="enunciado" ><?php echo $pergunta->getEnunciado() ?></textarea>
                </label>

                <label>
                    <p>Alternativa A</p>
                    <textarea name="altA" rows="2" class="enunciado"></textarea>
                </label>

                <label>
                    <p>Alternativa B</p>
                    <textarea name="altB" rows="2" class="enunciado"></textarea>
                </label>

                <label>
                    <p>Alternativa C</p>
                    <textarea name="altC" rows="2" class="enunciado"></textarea>
                </label>

                <label>
                    <p>Alternativa D</p>
                    <textarea name="altD" rows="2" class="enunciado"></textarea>
                </label>

                <label>
                    <p>Alternativa Correta</p>
                    <select name="correta" class="categories">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </label>

                <input type="submit" name="button" value="Salvar">
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script>
    $('.user').on("click", function () {
        $('.user-opt').toggleClass('displayed');
    });
</script>
</body>

</html>
