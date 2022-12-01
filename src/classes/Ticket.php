<?php

require_once __DIR__."\MySQL.php";

class Ticket{


    public function __construct(private int $ticket){
    }

    //ticket ------------------------------------------------
    public function getTicket():int{
        return $this->ticket;
    }


    //autenticar ------------------------------------------------
    public function autenticar():bool{
        $conexao = new MySQL();

        $sql = "SELECT valido FROM ticket WHERE ticket = '{$this->ticket}'";

        $ticketValido = $conexao->consulta($sql);


        if(!empty($ticketValido)){
            if($ticketValido['0']['valido'] == 0){
                return false;
            }

            $sql = "UPDATE ticket SET valido = '0'";
            $conexao->executa($sql);

            return true;
        }

        return false;
    }
}