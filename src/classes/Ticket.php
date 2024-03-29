<?php

namespace classes;

use db\MySQL;

class Ticket {


    public function __construct(private int $ticket){
    }

    //ticket ------------------------------------------------
    public function getTicket():int{
        return $this->ticket;
    }


    //autenticar ------------------------------------------------
    public function autenticar():bool{
        $conexao = new MySQL();

        $sql = "SELECT idTicket,valido FROM ticket WHERE ticket = '{$this->ticket}'";

        $ticketValido = $conexao->consulta($sql);

        if(!empty($ticketValido)){
            if($ticketValido['0']['valido'] == false){

                return false;
            }

            $conexao->executa($sql);

            session_start();
            $_SESSION['idTicket'] = $ticketValido['0']['idTicket'];
            $_SESSION['ticket'] = $this->ticket;

            return true;
        }
        

        return false;
    }

    //mostrar status ticket ------------------------------------------------
    public function findOrdem(){
        $conexao = new MySQL();

        $sql = "select ordemPrisao.nomeMeliante, statusOrdem.nome as 'statusOrdem',
        IF(ordemPrisao.idStatusOrdem = 2, statusPrisao.nome, 'Ainda não foi preso') as 'statusprisao',
        IF(ordemPrisao.idStatusOrdem = 2, time(TIMEDIFF(now(),prisao.horaPrisao)),'00:00' ) as 'tempoPreso'
        from ordemPrisao
        inner join statusOrdem on statusOrdem.idStatusOrdem = ordemPrisao.idStatusOrdem
        left join prisao on prisao.idOrdemPrisao = ordemPrisao.idOrdem
        left join statusPrisao on statusPrisao.idStatusPrisao = prisao.idStatusPrisao
        inner join ticket on ticket.idTicket = ordemPrisao.idTicket
        where ticket.ticket = {$this->ticket}";

        $status = $conexao->consulta($sql);

        if(!empty($status)){

            return $status['0'];

        }else{

            return false;
        }
    }
}