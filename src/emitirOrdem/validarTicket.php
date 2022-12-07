

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="../../globalStyles.css">
    <title>Insira seu Ticket</title>
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
            height: 60%;
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
        /*DETALHES*/
        h1{
            color: var(--white);
        }
    </style>
</head>
<body class="container">
    <header class="header">
        <!-- ALGO -->
    </header>
    <main class="main">
        <form action="validarTicket.php" method="post" class="form">

            <?php 
            require_once "../classes/Ticket.php";

            if(isset($_POST['submit'])){
                $ticket = new Ticket($_POST['ticket']);

                if($ticket->autenticar()){
                    header("location: emitirOrdem.php");
                }else{
                    echo "Ticket invalido ou já utilizado";
                }
            }
            ?>

            <label for="ticket">Insira seu Ticket</label>
            <input type="number" id="ticket" name="ticket" required>
            <input type="submit" value="Validar Ticket" name="submit">
        </form>
    </main>
</body>
</html>