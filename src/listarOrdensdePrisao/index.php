<?php

    require_once("../../vendor/autoload.php");
    
    use classes\OrdemPrisao;

    $ordens = OrdemPrisao::findall();
    var_dump($ordens);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/globalStyles.css">
    <title>Ordens de Prisão</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                Ordens de Prisão
            </div>
            <div class="user">
                <p>Policial</p>
                <span class="material-symbols-outlined">
                    local_police
                </span>
                <div class="user-opt">
                    <a href="#">Minhas prisões</a>
                    <a href="#">Sair</a>
                </div>
            </div>
        </div>

        <div class="main-content">

            <div class="order-list">
                <div class="order">
                    <div class="order-content">
                        <h2>Nome do Meliante</h2>
                        <div class="order-type">
                            <div class="ball" id="ball1"></div>
                            <p>Servidor</p>
                        </div>
                        <h4>Localização do meliante...</h4>

                        <a href="#tips1" rel="modal:open">
                            <p>&nbsp;Caracteríscias</p>
                        </a>
                        
                        
                        <h4 class="responsible">Responsável: Kelvin😎</h4>
                        <!-- Modal -->
                        <div id="tips1" class="modal">
                            <p>Caracterisicas do meliante aqui!</p>
                            <!-- <a href="#" rel="modal:close">Fechar</a> -->
                        </div>
                    </div>
                    <div class="order-btn">
                        <h2>Confirmar Prisão</h2>
                    </div>
                </div>

                <div class="order">
                    <div class="order-content">
                        <h2>Nome do Meliante</h2>
                        <div class="order-type">
                            <div class="ball" id="ball2"></div>
                            <p>Aluno</p>
                        </div>
                        <h4>Localização do meliante...</h4>


                        <a href="#tips2" rel="modal:open">
                            <p>&nbsp;Caracteríscias</p>
                        </a>


                        <!-- Modal -->
                        <div id="tips2" class="modal">
                            <p>Caracterisicas do meliante aqui!</p>
                            <p>Caracterisicas do meliante aqui!</p>
                            <!-- <a href="#" rel="modal:close">Fechar</a> -->
                        </div>
                    </div>
                    <div class="order-btn">
                        <h2>Assumir mandado</h2>
                    </div>
                </div>

                <div class="order">
                    <div class="order-content">
                        <h2>Nome do Meliante</h2>
                        <div class="order-type">
                            <div class="ball" id="ball3"></div>
                            <p>Visitante</p>
                        </div>
                        <h4>Localização do meliante...</h4>


                        <a href="#tips3" rel="modal:open">
                            <p>&nbsp;Caracteríscias</p>
                        </a>


                        <!-- Modal -->
                        <div id="tips3" class="modal">
                            <p>Caracterisicas do meliante aqui!</p>
                            <p>Caracterisicas do meliante aqui!</p>
                            <p>Caracterisicas do meliante aqui!</p>
                            <!-- <a href="#" rel="modal:close">Fechar</a> -->
                        </div>
                    </div>
                    <div class="order-btn">
                        <h2>Assumir mandado</h2>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script>
        $('.user').on("click", function () {
            $('.user-opt').toggleClass('displayed');
            console.log(this);
        });
    </script>
</body>

</html>