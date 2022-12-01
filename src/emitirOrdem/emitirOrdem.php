<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <input type="text" id="nomeMeliante" required>

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


            <label for="descMeliante">Descrição do Meliante:</label>
            <textarea name="descMeliante" id="descMeliante" cols="30" rows="10" required></textarea>

            <label for="ultimoLocal">Ultimo local visto:</label>
            <input type="text" id="ultimoLocal" required>

            <label for="nomeDenunciante">Seu nome:</label>
            <input type="text" id="nomeDenunciante" required>

            <label for="telDenunciante">Seu telefone:</label>
            <input type="tel" id="telDenunciante" required>

            <input type="submit" name="submit" value="Enviar">

        </form>
    </div>
</body>

</html>