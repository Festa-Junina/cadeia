<?php
require_once("../login/sessions/sessaoPolicial.php");

use classes\OrdemPrisao;
use classes\TipoMeliante;
use classes\Usuario;

date_default_timezone_set('America/Sao_Paulo');

$ordens = OrdemPrisao::findall();
$prisoes = OrdemPrisao::findallPresos();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="30">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/globalStyles.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/534/534102.png" type="image/png">
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
                    <a href="../login/logout.php">Sair</a>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="order-list">
                <?php
                if (count($ordens) > 0 || count($prisoes) > 0) {
                    foreach ($ordens as $ordem) {
                        $ordemId = $ordem->getIdOrdem();
                        $nomeMeliante = $ordem->getNomeMeliante();
                        $tipoMeliante = TipoMeliante::find($ordem->getIdTipoMeliante());
                        $nomeTipoMeliante = strtolower($tipoMeliante->getNome());
                        
                        $assumidoPor = "";
                        $presoPor = "";
                        $btnPrisao =  "<div class='order-btn disabled'><h2>Confirmar</h2></div>";
                        $btnResponsavel = "<div class='order-btn'><a href='#assumir{$ordemId}' rel='modal:open'><h2>Assumir</h2></a></div>";

                        $timeOrdem = new DateTime(date('H:i:s', $ordem->getHoraOrdem()));
                        $currentDate = new DateTime(date('H:i:s'));

                        $dateF = date_diff($currentDate, $timeOrdem);
                        $time = $dateF->format('%H') == '00' && $dateF->format('%I') == '00' ? 'Criada agora mesmo' : 
                                (
                                    'Criada à: ' .
                                    ($dateF->format('%H') == '00' ? '' : $dateF->format('%Hh')) . 
                                    ($dateF->format('%I') == '00' ? '' : $dateF->format('%Imin'))
                                );

                        $timer = "
                            <div class='time'>
                                <h3>{$time}</h3>
                            </div>
                        ";


                        if (!is_null($ordem->getAssumidaPor())) {
                            $resp = Usuario::find($ordem->getAssumidaPor());
                            $assumidoPor = $resp->getNome();
                            $btnResponsavel = "<div class='order-btn disabled'><h2>Assumido por {$assumidoPor}</h2></div>";
                            $btnPrisao =  "<div class='order-btn'><a href='#confirm{$ordemId}' rel='modal:open'><h2>Confirmar</h2></a></div>";
                        }
    
                        if(!is_null($ordem->getPresoPor())){
                            $policial = Usuario::find($ordem->getPresoPor());
                            $presoPor = $policial->getNome();
                            $btnResponsavel = !is_null($ordem->getAssumidaPor()) ? "<div class='order-btn disabled'><h2>Assumido por {$assumidoPor}</h2></div>" : "<div class='order-btn disabled'><h2>Assumir</h2></div>";
                            $btnPrisao = "<div class='order-btn disabled'><h2>Preso por {$presoPor}</h2></div>";
                            $timer ='';
                        }
    
                        $template = "
                        <div class='order'>
                            <div class='order-content'>
                                <div class='order-header'>
                                    <h2>{$nomeMeliante}</h2>
                                    {$timer}
                                </div>
                                <div class='order-type'>
                                    <div class='ball' id='ball-{$nomeTipoMeliante}'></div>
                                    <p>{$nomeTipoMeliante}</p>
                                </div>
                                <h4>📌 {$ordem->getLocalVisto()}</h4>
    
                                <a href='#tips{$ordemId}' rel='modal:open'>
                                    <p>&nbsp;Características</p>
                                </a>
                                <div id='tips{$ordemId}' class='modal'>
                                    <h1 class='modal-title'>Características de {$nomeMeliante}</h1>
                                    <p>{$ordem->getDescricaoMeliante()}
                                </div>
                            </div>
    
                            {$btnResponsavel}
                            {$btnPrisao}
                    
                            <div id='assumir{$ordemId}' class='modal'>
                                <h1 class='modal-title'>Tem certeza que deseja assumir a ordem de prisão de {$nomeMeliante}?</h1>
                                <div class='opt-btns'>
                                    <div class='btn-modal confirm-btn'>
                                        <form action='assumirPrisao.php' method='post'>
                                            <input type='hidden' name='idOrdemPrisao' value='{$ordemId}'>
                                            <input name='assumir' type='submit' value='Sim'>
                                        </form>
                                    </div>
                                    <div class='btn-modal cancel-btn'>
                                        <a rel='modal:close'>Não</a>
                                    </div>
                                </div>
                            </div>
    
                            <div id='confirm{$ordemId}' class='modal'>
                                <h1 class='modal-title'>Tem certeza que deseja confirmar a prisão de {$nomeMeliante}?</h1>
                                <div class='opt-btns'>
                                    <div class='btn-modal confirm-btn'>
                                        <form action='confirmaPrisao.php' method='post'>
                                            <input type='hidden' name='idOrdemPrisao' value='{$ordemId}'>
                                            <input name='confirmar' type='submit' value='Sim'>
                                        </form>
                                    </div>
                                    <div class='btn-modal cancel-btn'>
                                        <a rel='modal:close'>Não</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        echo $template;
                    }

                    foreach ($prisoes as $ordem) {
                        $ordemId = $ordem->getIdOrdem();
                        $nomeMeliante = $ordem->getNomeMeliante();
                        $tipoMeliante = TipoMeliante::find($ordem->getIdTipoMeliante());
                        $nomeTipoMeliante = strtolower($tipoMeliante->getNome());
                        
                        $assumidoPor = "";
                        $presoPor = "";
                        $btnPrisao =  "<div class='order-btn disabled'><h2>Confirmar</h2></div>";
                        $btnResponsavel = "<div class='order-btn'><a href='#assumir{$ordemId}' rel='modal:open'><h2>Assumir</h2></a></div>";

                        if (!is_null($ordem->getAssumidaPor())) {
                            $resp = Usuario::find($ordem->getAssumidaPor());
                            $assumidoPor = $resp->getNome();
                            $btnResponsavel = "<div class='order-btn disabled'><h2>Assumido por {$assumidoPor}</h2></div>";
                            $btnPrisao =  "<div class='order-btn'><a href='#confirm{$ordemId}' rel='modal:open'><h2>Confirmar</h2></a></div>";
                        }
    
                        if(!is_null($ordem->getPresoPor())){
                            $policial = Usuario::find($ordem->getPresoPor());
                            $presoPor = $policial->getNome();
                            $btnResponsavel = !is_null($ordem->getAssumidaPor()) ? "<div class='order-btn disabled'><h2>Assumido por {$assumidoPor}</h2></div>" : "<div class='order-btn disabled'><h2>Assumir</h2></div>";
                            $btnPrisao = "<div class='order-btn disabled'><h2>Preso por {$presoPor}</h2></div>";
                        }
    
                        $template = "
                        <div class='order'>
                            <div class='order-content'>
                                <div class='order-header'>
                                    <h2>{$nomeMeliante}</h2>
                                </div>
                                <div class='order-type'>
                                    <div class='ball' id='ball-{$nomeTipoMeliante}'></div>
                                    <p>{$nomeTipoMeliante}</p>
                                </div>
                                <h4>📌 {$ordem->getLocalVisto()}</h4>
    
                                <a href='#tips{$ordemId}' rel='modal:open'>
                                    <p>&nbsp;Características</p>
                                </a>
                                <div id='tips{$ordemId}' class='modal'>
                                    <h1 class='modal-title'>Características de {$nomeMeliante}</h1>
                                    <p>{$ordem->getDescricaoMeliante()}
                                </div>
                            </div>
    
                            {$btnResponsavel}
                            {$btnPrisao}
                    
                            <div id='assumir{$ordemId}' class='modal'>
                                <h1 class='modal-title'>Tem certeza que deseja assumir a ordem de prisão de {$nomeMeliante}?</h1>
                                <div class='opt-btns'>
                                    <div class='btn-modal confirm-btn'>
                                        <form action='assumirPrisao.php' method='post'>
                                            <input type='hidden' name='idOrdemPrisao' value='{$ordemId}'>
                                            <input name='assumir' type='submit' value='Sim'>
                                        </form>
                                    </div>
                                    <div class='btn-modal cancel-btn'>
                                        <a rel='modal:close'>Não</a>
                                    </div>
                                </div>
                            </div>
    
                            <div id='confirm{$ordemId}' class='modal'>
                                <h1 class='modal-title'>Tem certeza que deseja confirmar a prisão de {$nomeMeliante}?</h1>
                                <div class='opt-btns'>
                                    <div class='btn-modal confirm-btn'>
                                        <form action='confirmaPrisao.php' method='post'>
                                            <input type='hidden' name='idOrdemPrisao' value='{$ordemId}'>
                                            <input name='confirmar' type='submit' value='Sim'>
                                        </form>
                                    </div>
                                    <div class='btn-modal cancel-btn'>
                                        <a rel='modal:close'>Não</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        echo $template;
                    }
                } else{
                    $template = "<div class='not-found'><h1 class='modal-title' >Nenhuma ordem de prisão encontrada</h4></div>";
                    echo $template;
                }

                ?>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script>
        $('.user').on("click", function() {
            $('.user-opt').toggleClass('displayed');
        });
    </script>
</body>

</html>