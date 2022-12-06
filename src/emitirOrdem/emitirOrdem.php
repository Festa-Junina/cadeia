<?php 

    require_once "../db/MySQL.php";
    require_once "../classes/OrdemPrisao.php";
    session_start();

    if(isset($_POST['submit'])){
        $ordemPrisao = new OrdemPrisao($_POST['nomeMeliante'],$_POST['descricaoMeliante'],$_POST['localVisto'],$_POST['nomeDenunciante'],$_POST['telefoneDenunciante']);
        
        $ordemPrisao->setIdTicket($_SESSION['idTicket']);
        
        $ordemPrisao->setIdTipoMeliante($_POST['tipoMeliante']);
        $ordemPrisao->setIdTurmaMeliante($_POST['turmaMeliante']);

        $ordemPrisao->save();

        header("location: ../../index.html");

    }


    
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emitir Ordem de Prisão</title>
</head>
    <!-- remover style teste-->
    <style>
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
            display: grid;
            place-items: center;
            color: white;
            background-color:black;
        }
        form{
            display: flex;
            flex-direction: column;
        }
    </style>

<body>
    <div class="centro">
        <form action="emitirOrdem.php" method="post">

            <label for="nomeMeliante">Nome do Meliante:</label>
            <input type="text" name="nomeMeliante" id="nomeMeliante" required>

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
            <label for="turmaMeliante">Turma do Meliante:</label>
            <select name="turmaMeliante" id="turmaMeliante" required>
                <option value="" disabled selected>Escolha uma turma</option>
   
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
            <textarea name="descricaoMeliante" id="descricaoMeliante" cols="30" rows="10" required></textarea>

            <label for="localVisto">Ultimo local visto:</label>
            <input type="text" name="localVisto" id="localVisto" required>

            <label for="nomeDenunciante">Seu nome:</label>
            <input type="text" name="nomeDenunciante" id="nomeDenunciante" required>

            <label for="telefoneDenunciante">Seu telefone:</label>
            <input type="tel" name="telefoneDenunciante" id="telefoneDenunciante" required>

            <input type="submit" name="submit" value="Enviar">

        </form>
    </div>
</body>

</html>