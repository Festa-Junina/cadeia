<?php

class Policial implements ActiveRecord{

    private int $id_policial;
    
    public function __construct(
        private string $nome,
        private string $email,
        private string $senha){
    }

    public function setIdPolicial(int $id_policial):void{
        $this->id_policial = $id_policial;
    }

    public function getIdPolicial():int{
        return $this->id_policial;
    }

    public function setNome(string $nome):void{
        $this->nome = $nome;
    }

    public function getNome():string{
        return $this->nome;
    }

    public function setEmail(string $email):void{
        $this->email = $email;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setSenha(int $senha):void{
        $this->senha = $senha;
    }

    public function getSenha():int{
        return $this->senha;
    }

    public function save():bool{
        $conexao = new MySQL();
        if(isset($this->id_policial)){
            $sql = "UPDATE policiais SET nome = '{$this->nome}' ,email = '{$this->email}',senha = {$this->senha} WHERE id_policial = {$this->id_policial}";
        }else{
            $sql = "INSERT INTO policiais (nome,email,senha) VALUES ('{$this->nome}','{$this->email}',{$this->senha})";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM policiais WHERE id_policial = {$this->id_policial}";
        return $conexao->executa($sql);
    }

    public static function find($id_policial):Policial{
        $conexao = new MySQL();
        $sql = "SELECT * FROM policiais WHERE id_policial = {$id_policial}";
        $resultado = $conexao->consulta($sql);
        $p = new Policial($resultado[0]['nome'],$resultado[0]['email'],$resultado[0]['senha']);
        $p->setIdPolicial($resultado[0]['id_policial']);
        return $p;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM polciais";
        $resultados = $conexao->consulta($sql);
        $policiais = array();
        foreach($resultados as $resultado){
            $p = new Policial($resultado['nome'],$resultado['email'],$resultado['senha']);
            $p->setIdPolicial($resultado['id_policial']);
            $policiais[] = $p;
        }
        return $policiais;
    }

    
}
