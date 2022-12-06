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

//echo"ticket ja utilizado"; 

                return false;
            }

            $conexao->executa($sql);

            session_start();
            $_SESSION['idTicket'] = $ticketValido['0']['idTicket'];
            return true;
        }
        
//echo"ticket nao existe";  

        return false;
    }
}




public function findOrdem(){
    $conexao = new MySQL();

    $sql = "SELECT statusprisao.nome
    FROM ordemprisao JOIN statusprisao ON statusprisao.idStatusPrisao = ordemprisao.idStatusOrdem
    WHERE ordemprisao.idTicket = {$this->ticket}'";

    $status = $conexao->consulta($sql);

    if(!empty($status)){

        return $status['0'];

    }else{

        return false;
    }
}