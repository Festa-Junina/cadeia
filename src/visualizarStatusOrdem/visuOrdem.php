<?php 

require_once "../classes/Ticket.php";


if(isset($_POST['submit'])){
    $ticket = new Ticket($_POST['ticket']);
    $resultado = $ticket->findOrdem();    
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="../../globalStyles.css">
    <title>Visualizar Ordem de Prisão</title>
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
            height: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
        }
        .statusOrdem{
            height: 50%;
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
        <h1>Visualizar Ordem de Prisão</h1>
    </header>
    <main class="main">
        <form action ="visuOrdem.php" method="post" class="form">
            <label for="ticket">Insira o Ticket para a Consulta</label>
            <input type="number" id="ticket" name="ticket" required>
            <input type="submit" value="Consultar Ordem" name="submit">
        </form>

        <?php 

        if(isset($resultado)){
            if($resultado != false){

                echo "
                    <div class='statusOrdem'>
                        <span>Nome Meliante: {$resultado['nomeMeliante']}</span>
                        <span>Status Ordem: {$resultado['statusOrdem']}</span>
                        <span>Status Prisão: {$resultado['statusprisao']}</span>
                        <span>Tempo de Prisão: {$resultado['tempoPreso']}</span>
                    </div>        
                ";
    
            }else{
                echo "Ticket inválido";
            }
        }
        ?>
    </main>
</body>
</html>