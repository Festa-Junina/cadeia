<?php

class Carcereiro implements ActiveRecord{

    private int $codCarc;
    private string $nomeCarc;
    private string $emailCarc;
    private int $telCarc;

    public function __construct(private string $email){
    }

    public function setCodCarc(int $codCarc):void{
        $this->codCarc = $codCarc;
    }

    public function getCodCarc():int{
        return $this->codCarc;
    }

    public function setNomeCarc(string $nomeCarc):void{
        $this->nomeCarc = $nomeCarc;
    }

    public function getNomeCarc():string{
        return $this->nomeCarc;
    }

    public function setEmailCarc(string $emailCarc):void{
        $this->emailCarc = $emailCarc;
    }
    
    public function getEmailCarc():string{
        return $this->emailCarc;
    }

    public function setTelcarc(string $telCarc):void{
        $this->telCarc = $telCarc;
    }
    
    public function getTelCarc():int{
        return $this->telCarc;
    }

    public function save():bool{
        $conexao = new MySQL();
        
        if(isset($this->id)){
            $sql = "UPDATE carcereiros SET nomeCarc = '{$this->nomeCarc}', emailCarc = '{$this->emailCarc}', telCarc = '{$this->telCarc}' WHERE codCarc = {$this->codCarc}";
        }else{
            $sql = "INSERT INTO carcereiros (nomeCarc, emailCarc, telCarc) VALUES ('{$this->nomeCarc}', '{$this->emailCarc}', '{$this->telCarc}')";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM carcereiros WHERE codCarc = {$this->codCarc}";
        return $conexao->executa($sql);
    }

    public static function find($codCarc):Carcereiro{
        $conexao = new MySQL();
        $sql = "SELECT * FROM carcereiros WHERE codCarc = {$codCarc}";
        $resultado = $conexao->consulta($sql);
        $p = new Carcereiro($resultado[0]['email']);
        $p->setCodcarc($resultado[0]['codCarc']);
        $p->setNomeCarc($resultado[0]['nomeCarc']);
        $p->setEmailCarc($resultado[0]['emailCarc']);
        $p->setTelCarc($resultado[0]['telCarc']);
        return $p;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM carcereiros";
        $resultados = $conexao->consulta($sql);
        
        $carcereiros = array();
        foreach($resultados as $resultado){
            $p = new Carcereiro($resultado['email']);
            $p = new Carcereiro($resultado[0]['email']);
        $p->setCodcarc($resultado['codCarc']);
        $p->setNomeCarc($resultado['nomeCarc']);
        $p->setEmailCarc($resultado['emailCarc']);
        $p->setTelCarc($resultado['telCarc']);
            $carcereiros[] = $p;
        }
        return $carcereiros;
    }

    
}
