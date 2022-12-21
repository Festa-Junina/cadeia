<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/assets/styles/reset.css">
    <link rel="stylesheet" href="src/assets/styles/globalStyles.css">
    <link rel="stylesheet" href="src/assets/styles/style.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/534/534102.png" type="image/png">
    <title>Home</title>
</head>
<body>

<?php
    if(isset($_GET['success'])){
        $passou = $_GET['success'];
        if($passou == "yes"){
            $ticket = $_GET['ticket'];
            echo "<div class='blur' id='blur'></div>
            <div class='modal' id='modal'>
                <h1>Sucesso!</h1>
                <p>Sua ordem de prisão foi emitida com sucesso, lembre-se do seu numero de ticket <mark>$ticket</mark>, pois com ele você pode acompanhar o andamento da ordem.</p>
                <button class='button' id='closeModal'>Fechar</button>
            </div>";
        }else{
            echo "<div class='blur' id='blur'></div>
            <div class='modal' id='modal'>
                <h1>Cancelado</h1>
                <p>A sua operação foi cancelado com sucesso, o seu ticket não foi utilizado</p>
                <button class='button' id='closeModal'>Fechar</button>
            </div>";
        }
    }
    ?>

    <header class="header">
        <div class="container container-header">
            <a href="saibaMais.html" class="button">Saiba Mais</a>
            <a href="src/login" class="button">Restrito</a>
        </div>
    </header>
    <main class="main container">
        <h1>Olá, seja bem vindo(a)!</h1>

        <h2>Como emitir uma nova ordem de prisão, paso a paso:</h2>
        <ol>
            <li>Vá em Emitir Nova Ordem de Prisão;</li>
            <li>Valide o seu ticket o inserindo;</li>
            <li>Preencha o formulário para emissão de umanova ordem de prisão, lembrando que todos oscampos são obrigatórios;</li>
            <li>Envie o formulário e aguarde a confirmaçãonesta página;</li>
            <li>Em caso de erro verifique o ticket, se oerro persistir contate o administradoradmCadeia@adm.com</li>
        </ol>
        <details class="detalheNovaOrdem">
            <summary>
                Perguntas frequentes
            </summary>
            <ul>
                <li>Como eu posso adquirir o ticket ?</li>
                <li>Estou tendo problemas com a validação do ticket, o que devo fazer ?</li>
                <li>Estou tendo problemas com o formulario, o que devo fazer ?</li>
            </ul>
        </details>

        
        <a href="src/emitirOrdem/validarTicket.php" class="button">Quero emitir Nova Ordem de Prisão</a>
    <a href="src/visualizarStatusOrdem/visuOrdem.php" class="button">Quero acompanhar Ordem Já Existente</a>
    </main>
    <script src="src/emitirOrdem/modal.js"></script>

</body>
</html>