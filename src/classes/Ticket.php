<?php


require_once "../db/MySQL.php";

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

        $sql = "SELECT idTicket,valido FROM ticket WHERE ticket = '{$this->ticket}'";

        $ticketValido = $conexao->consulta($sql);

        if(!empty($ticketValido)){
            if($ticketValido['0']['valido'] == false){

                return false;
            }

            $conexao->executa($sql);

            session_start();
            $_SESSION['idTicket'] = $ticketValido['0']['idTicket'];
            return true;
        }
        

        return false;
    }





public function findOrdem(){
    $conexao = new MySQL();

    $sql = "select ordemprisao.nomeMeliante, statusordem.nome as 'statusOrdem', 
    IF(ordemprisao.idStatusOrdem = 2, statusprisao.nome, 'Ainda não foi preso') as 'statusprisao'
    from ordemprisao
    inner join statusordem on statusordem.idStatusOrdem = ordemprisao.idStatusOrdem
    left join prisao on prisao.idOrdemPrisao = ordemprisao.idOrdem
    left join statusprisao on statusprisao.idStatusPrisao = prisao.idStatusPrisao
    where ordemprisao.idTicket = {$this->ticket}"; 

    $status = $conexao->consulta($sql);

    if(!empty($status)){

        return $status['0'];

    }else{

        return false;
    }
}

}