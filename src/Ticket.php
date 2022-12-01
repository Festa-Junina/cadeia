<?php

require_once __DIR__."\MySQL.php";

class Ticket{

   // private boolean $valido;

    public function __construct(private int $ticket){
    }

    //ticket ------------------------------------------------
    public function getTicket():int{
        return $this->ticket;
    }

    /* //valido ------------------------------------------------
    public function setValido($valido):void{
        $this->valido = $valido;
    }

    public function getValido():string{
        return $this->valido;
    }*/
 
    //FINDTICKET ------------------------------------------------

    public static function findTicket():Ticket{
        $conexao = new MySQL();
        $sql = "SELECT  FROM ticket WHERE ticket = '{$this->getTicket}'";
        $ticket = $conexao->consulta($sqlPosts);

        $ticket = new Post($post['0']['criador'],$post['0']['foto']);

        
        return $p;
    }

    //FINDPROFILE ------------------------------------------------
    public static function findAllPosts():array{
        $conexao = new MySQL();
        $sqlPosts = "SELECT * FROM post ORDER BY dataCriacao desc";
        $postsBanco = $conexao->consulta($sqlPosts);
        
        $postsProfile = array();
        foreach($postsBanco as $post){

            $sqlUser = "SELECT usuario.nome,turma.curso,usuario.foto FROM usuario, turma WHERE usuario.turma = turma.id AND usuario.id = '{$post['criador']}'";
            
            $userBanco = $conexao->consulta($sqlUser);

            $u = new User();
            $u->setNome($userBanco['0']['nome']);
            $u->setTurma($userBanco['0']['curso']);     
            $u->setfoto($userBanco['0']['foto']);

            $p = new Post($post['criador'],$post['foto']);
            $p->setId($post['id']);
            $p->setDescricao($post['descricao']);
            $p->setData(strval($post['dataCriacao']));

            $postsProfile[] = array($u,$p);
        }
        return $postsProfile;
    }


    //SALVAR ------------------------------------------------
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