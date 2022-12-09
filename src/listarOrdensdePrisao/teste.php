<?php
                $cont = 1;
                foreach ($ordens as $ordem) {
                    $tipoMeliante = TipoMeliante::find($ordem->getIdTipoMeliante());
                    $nomeMeliante = $tipoMeliante->getNome();
                    $idMeliante = $tipoMeliante->getIdTipoMeliante();
                    $time = date('i:s', $ordem->getHoraOrdem());
                    $policial = "";
                    $btnConfirmar =  '';
                    $modalText = 'Tem certeza que deseja assumir esta ordem de prisão?';
                    $btnResponsavel = "<div class='order-btn disabled'><a href='#modal{$cont}' rel='modal:open'><h2>Assumir</h2></a></div>";

                    if ($ordem->getAssumidaPor() != 0) {
                        $policial = 'Teste';
                        $btnResponsavel = "<div class='order-btn disabled'><h2>Assumido por {$policial}</h2></div>";
                        $btnConfirmar = "<div class='order-btn'><h2>Confirmar Prisão</h2></div>";
                        $modalText = 'Tem certeza que deseja confirmar a prisão?';
                    }


                    $template = "<div class='order'>
                    <div class='order-content'>
                        <div class='order-header'>
                            <h2>{$ordem->getNomeMeliante()}</h2>
                            <h3>{$time}</h3>
                        </div>
                        <div class='order-type'>
                            <div class='ball' id='ball1'></div>
                            <p>{$tipoMeliante}</p>
                        </div>
                        <h4>📌{$ordem->getLocalVisto()}</h4>

                        <a href='#tips{$cont}' rel='modal:open'>
                            <p>&nbsp;Características</p>
                        </a>
                        <div id='tips{$cont}' class='modal'>
                            <h1 class='modal-title'>Características do Meliante</h1>
                            <p>{$ordem->getDescricaoMeliante()}</p>
                        </div>
                    </div>
                    {$btnResponsavel}
                    {$btnConfirmar}

                    <div id='modal{$cont}' class='modal'>
                            <p>{$modalText}</p>
                    </div>
                </div>";