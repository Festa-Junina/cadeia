<?php
require_once("../../vendor/autoload.php");

use classes\OrdemPrisao;
use classes\TipoMeliante;

$ordens = OrdemPrisao::findall();
foreach ($ordens as $ordem) {
    var_dump($ordem->getIdTurmaMeliante());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="../../globalStyles.css">
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
                    <a href="#">Sair</a>
                </div>
            </div>
        </div>

        <div class="main-content">

            <div class="order-list">

                <?php
                $cont = 1;
                foreach ($ordens as $ordem) {
                    //$tipoMeliante = TipoMeliante::find($ordem->getIdTipoMeliante());
                    
                    $tipoMeliante = TipoMeliante::find($ordem->getIdTipoMeliante());
                    $nomeTipoMeliante = strtolower($tipoMeliante->getNome());
                    $idMeliante = $tipoMeliante->getIdTipoMeliante();
                    $time = date('i:s', $ordem->getHoraOrdem());
                    $policial = "";
                    $btnConfirmar =  "<div class='order-btn'><a href='#confirm{$cont}' rel='modal:open'><h2>Confirmar</h2></a></div>";
                    $modalText = 'Tem certeza que deseja assumir esta ordem de prisão?';
                    $btnResponsavel = "<div class='order-btn'><a href='#modal{$cont}' rel='modal:open'><h2>Assumir</h2></a></div>";
                    if ($ordem->getAssumidaPor() != null) {
                        $policial = 'Teste';
                        $btnResponsavel = "<div class='order-btn disabled'><h2>Assumido por {$policial}</h2></div>";
                        $btnConfirmar = "<div class='order-btn'><a href='#confirm{$cont}' rel='modal:open'><h2>Confirmar</h2></a></div>";
                        $modalText = 'Tem certeza que deseja confirmar a prisão?';
                    }


                    $template = "<div class='order'>
                    <div class='order-content'>
                        <div class='order-header'>
                            <h2>{$ordem->getNomeMeliante()}</h2>
                            <h3>{$time}</h3>
                        </div>
                        <div class='order-type'>
                            <div class='ball' id='ball-{$nomeTipoMeliante}'></div>
                            <p>{$nomeTipoMeliante}</p>
                        </div>
                        <h4>📌{$ordem->getLocalVisto()}</h4>

                        <a href='#tips{$cont}' rel='modal:open'>
                        <p>&nbsp;Características</p>
                    </a>
                    <div id='tips{$cont}' class='modal'>
                        <h1 class='modal-title'>Características do Meliante</h1>
                        <p>{$ordem->getDescricaoMeliante()}
                        <br>
                        {$ordem->getIdTurmaMeliante()}</p>

                        
                    </div>
                </div>
                {$btnResponsavel}
                {$btnConfirmar}

                <div id='modal{$cont}' class='modal'>
                    Tem certeza que deseja assumir esta ordem de prisão?
                </div>

                <div id='confirm{$cont}' class='modal'>
                    <h1 class='modal-title'>Tem certeza que deseja confirmar a prisão de {$ordem->getNomeMeliante()}?</h1>
                    <div class='opt-btns'>
                        <div class='btn-modal confirm-btn'>
                            <form action='confirmaPrisao.php' method='post'>
                                <input type='hidden' name='idOrdemPrisao' value='{$ordem->getIdOrdem()}'>
                                <input name='confirm' type='submit' value='Sim'>
                            </form>
                        </div>
                        <div class='btn-modal cancel-btn'>
                            <a rel='modal:close'>Não</a>
                        </div>
                    </div>
                </div>
                </div>";

                    $cont++;
                    echo $template;
                }
                ?>
                <div class="order">
                    <div class="order-content">
                        <div class="order-header">
                            <h2>Nome do Meliante</h2>
                            <h3>02:30</h3>
                        </div>
                        <div class="order-type">
                            <div class="ball" id="ball1"></div>
                            <p>Servidor</p>
                        </div>
                        <h4>Localização do meliante...</h4>

                        <a href="#tips1" rel="modal:open">
                            <p>&nbsp;Características</p>
                        </a>


                        <h4 class="responsible">Responsável: Kelvin😎</h4>
                        <!-- Modal -->
                        <div id="tips1" class="modal">
                            <p>Características do meliante aqui!</p>
                            <div class='btn-modal confirm-btn'>
                                <form action='confirmaPrisao.php' method='post'>
                                    <input type='hidden' name='idOrdemPrisao' value='{$ordem}'>
                                    <input name='confirm' type='submit' value='Sim'>
                                </form>
                            </div>
                            <div class='btn-modal cancel-btn'>
                                <a rel='modal:close'>Não</a>
                            </div>
                        </div>
                    </div>
                    <div class="order-btn">
                        <h2>Confirmar Prisão</h2>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script>
        $('.user').on("click", function() {
            $('.user-opt').toggleClass('displayed');
            console.log(this);
        });
    </script>
</body>

</html>