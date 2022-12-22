<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="globalStyles.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
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
                <h1 class='h1-index'>Sucesso!</h1>
                <p>Sua ordem de prisão foi emitida com sucesso, lembre-se do seu numero de ticket <mark>$ticket</mark>, pois com ele você pode acompanhar o andamento da ordem.</p>
                <button class='button' id='closeModal'>Fechar</button>
            </div>";
        }else{
            echo "<div class='blur' id='blur'></div>
            <div class='modal' id='modal'>
                <h1 class='h1-index'>Cancelado</h1>
                <p>A sua operação foi cancelado com sucesso, o seu ticket não foi utilizado</p>
                <button class='button' id='closeModal'>Fechar</button>
            </div>";
        }
    }
    ?>

    <header class="header">
        <div class="container container-header">
            <div class="criador">
                <img src="icone.png" alt="" class="img-icone">
                <h1>Alcatraz IFRS</h1>
            </div>
            <a href="saibaMais.html" class="button button-header">Saiba Mais</a>
            <a href="src/login/index.php" class="button button-header">Restrito</a>
        </div>
    </header>
    <main class="main container">
        <h1 class="h1-index">Olá, seja bem vindo(a)!</h1>
        <h2>Como emitir uma nova ordem de prisão, paso a paso:</h2>
        <ol>
            <li>Vá em Quero Emitir Nova Ordem de Prisão;</li>
            <li>Valide o seu ticket o inserindo;</li>
            <li>Preencha o formulário para emissão de uma nova ordem de prisão, lembrando que todos os campos são obrigatórios;</li>
            <li>Envie o formulário e aguarde a confirmação nesta página;</li>
            <li>Lembre se do seu ticket, pois ele será necessário na hora que você quiser consultar como está o andamento da sua ordem de prisão;</li>
            <li>Em caso de erro verifique o ticket, se o erro persistir contate o administrador@adm.com</li>
        </ol>

        <details class="detalheNovaOrdem">
            <summary>
                Perguntas Frequentes
            </summary>
            <ul>
                <li>Como eu posso adquirir o ticket ?</li>
                <p>Os tickets são entregues aos alunos da instituição ao início da festa, mas poderão ser adquiridos por meio das atividades de São João nas barraquinhas.</p>
                <li>Estou tendo problemas com a validação do ticket, o que devo fazer ?</li>
                <p>Em caso de problemas com a validação do ticket, revise se foi digitado corretamente, verifique se este ticket já não foi usado anteriormente o pesquisando no Quero acompanhar uma Ordem já existente, tente validar outros tickets, se o problema persistir contate o administrador em administrador@adm.com.</p>
                <li>Estou tendo problemas com o formulario, o que devo fazer ?</li>
                <p>Em caso de problemas com o formulário verifique se todos os campos estão preenchidos corretamente, lembrando que todos os campos são obrigatórios, se o problema persistir atualize a página, não se preocupe pois se a ordem não for criada o seu ticket não será utilizado.</p>
                <li>Estou tendo problemas na hora de consultar uma Ordem de Prisão, o que devo fazer ?</li>
                <p>Em caso de problemas na hora de consultar uma Ordem de Prisão já existente, revise se o ticket digitado está correto, lembrando que para consultar uma Prisão no ticket digitado antes você deve ter emitido uma Ordem de Prisão neste ticket, atualiza a página, se o problema persistir contate o administrador em administrador@adm.com.</p>
            </ul>
        </details>

        <a href="src/emitirOrdem/validarTicket.php" class="button">Quero emitir Nova Ordem de Prisão</a>
        <a href="src/visualizarStatusOrdem/visuOrdem.php" class="button">Quero acompanhar Ordem já existente</a>
    </main>
    <script src="script.js"></script>

</body>
</html>