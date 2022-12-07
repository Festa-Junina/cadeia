<?php 

    require_once "../db/MySQL.php";
    require_once "../classes/OrdemPrisao.php";
    session_start();

    if(isset($_POST['submit'])){

        $ordemPrisao = new OrdemPrisao($_POST['nomeMeliante'],$_POST['descricaoMeliante'],$_POST['localVisto'],$_POST['nomeDenunciante'],$_POST['telefoneDenunciante']);
        
        $ordemPrisao->setIdTicket($_SESSION['idTicket']);
        
        $ordemPrisao->setIdTipoMeliante($_POST['tipoMeliante']);

        if(isset($_POST['turmaMeliante'])){
            $ordemPrisao->setIdTurmaMeliante($_POST['turmaMeliante']);
        }

        $ordemPrisao->save();

        //mensagem de sucesso?
        header("location: ../../index.html");

    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="../../globalStyles.css">
    <title>Emitir Ordem de Prisão</title>
    <style>
        body{
            width: 100vw;
            height: 100vh;
            color: var(--gray);
            background-color: var(--primary);
        }
        .container{
            margin: 0 auto;
            width: 90%;
            max-width: 480px;
        }
        .header{
            position: sticky;
            left: 0;
            top: 0;
            width: 100%;
            height: 10%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .main{
            display: flex;
            height: 90%;
            flex-direction: column;
            justify-content: space-around;
        }
        .form{
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
        }
        .button{
            height: 3em;
            background-color: var(--green);
            display: flex;
            border-radius: 5px;
            align-items: center;
            justify-content: center;
            min-width: 120px;
        }
        .button-header{
            height: 2em;
            background-color: var(--primaryVariant);
        }
        input{
            border-radius: 3px;
        }
        /*DETALHES*/
        h1{
            color: var(--white);
        }
    </style>
</head>

<body class="container">
    <header class="header">
        <h1>Emitir Ordem de Prisão</h1>
    </header>
    <main class="main">
        <form action="emitirOrdem.php" method="post" class="form">

            <label for="nomeMeliante">Nome do Meliante:</label>
            <input type="text" name="nomeMeliante" id="nomeMeliante" placeholder="ex: João da Silva Morais" required>

            <label for="tipoMeliante">Tipo do Meliante:</label>
            <select name="tipoMeliante" id="tipoMeliante" required>
                <option value="" disabled selected>Escolha um tipo</option>

                    <?php 
                        $conexao = new MySQL();
                        $sql = "SELECT * FROM tipomeliante";
                        $tiposMeliantes = $conexao->consulta($sql);
                        foreach($tiposMeliantes as $tipo){
                            echo "<option value='{$tipo['idTipoMeliante']}'> {$tipo['nome']} </option>";
                        }
                    ?>  
            </select>

            <!-- SO ABRE SE FOR ALUNO -->
            <label for="turmaMeliante">Turma do Meliante: (Se for aluno)</label>
            <select name="turmaMeliante" id="turmaMeliante">
                <option value="NULL" disabled selected>Escolha uma turma</option>
   
                <?php 
                    $conexao = new MySQL();
                    $sql = "SELECT * FROM turmameliante";
                    $turmaMeliantes = $conexao->consulta($sql);
                    foreach($turmaMeliantes as $turma){
                        echo "<option value='{$turma['idTurmaMeliante']}'> {$turma['nome']} </option>";
                    }
                ?> 

            </select>
            <!--  -->

            <label for="descricaoMeliante">Descrição do Meliante:</label>
            <textarea name="descricaoMeliante" id="descricaoMeliante" cols="30" rows="10" required>
ex-cabelo: 

ex-parte superior: 

ex-parte inferior: 

ex-tênis: 

            </textarea>

            <label for="localVisto">Ultimo local visto:</label>
            <input type="text" name="localVisto" id="localVisto" placeholder="ex: Em frete a praça principal" required>

            <label for="nomeDenunciante">Seu nome:</label>
            <input type="text" name="nomeDenunciante" id="nomeDenunciante" placeholder="ex: Elías dos Anjos" required>

            <label for="telefoneDenunciante">Seu telefone:</label>
            <input type="tel" name="telefoneDenunciante" id="telefoneDenunciante" placeholder="(51) 9 98536256" required>

            <input type="submit" name="submit" value="Enviar" class="button">

        </form>
    </main>
</body>
</html>