<?php

namespace classes;

use db\ActiveRecord;
use db\MySQL;

class Pergunta implements ActiveRecord
{
    private int $idPergunta;

    public function __construct(
        private int $idCategoria,
        private string $enunciado,
        private string $alternativaA,
        private string $alternativaB,
        private string $alternativaC,
        private string $alternativaD,
        private string $alternativaCorreta
    ) {}

    public function getIdPergunta(): int
    {
        return $this->idPergunta;
    }
    public function setIdPergunta(int $idPergunta): void
    {
        $this->idPergunta = $idPergunta;
    }

    public function getIdCategoria(): int
    {
        return $this->idCategoria;
    }
    public function setIdCategoria(int $idCategoria): void
    {
        $this->idCategoria = $idCategoria;
    }

    public function getEnunciado(): string
    {
        return $this->enunciado;
    }
    public function setEnunciado(string $enunciado): void
    {
        $this->enunciado = $enunciado;
    }

    public function getAlternativaA(): string
    {
        return $this->alternativaA;
    }
    public function setAlternativaA(string $alternativaA): void
    {
        $this->alternativaA = $alternativaA;
    }

    public function getAlternativaB(): string
    {
        return $this->alternativaB;
    }
    public function setAlternativaB(string $alternativaB): void
    {
        $this->alternativaB = $alternativaB;
    }

    public function getAlternativaC(): string
    {
        return $this->alternativaC;
    }
    public function setAlternativaC(string $alternativaC): void
    {
        $this->alternativaC = $alternativaC;
    }

    public function getAlternativaD(): string
    {
        return $this->alternativaD;
    }
    public function setAlternativaD(string $alternativaD): void
    {
        $this->alternativaD = $alternativaD;
    }

    public function getAlternativaCorreta(): string
    {
        return $this->alternativaCorreta;
    }
    public function setAlternativaCorreta(string $alternativaCorreta): void
    {
        $this->alternativaCorreta = $alternativaCorreta;
    }

    public function save(): bool
    {
        $connection = new MySQL();
        
        if (isset($this->idPergunta)) {
            $sql = "UPDATE `pergunta` SET `idCategoria`= {$this->idCategoria}, `enunciado`= '{$this->enunciado}', `alternativaA`= '{$this->alternativaA}', `alternativaB`= '{$this->alternativaB}', `alternativaC`= '{$this->alternativaC}', `alternativaD`= '{$this->alternativaD}', `alternativaCorreta`= '{$this->alternativaCorreta}' WHERE idPergunta = {$this->idPergunta};";
        } else {
            $sql = "INSERT INTO `pergunta` (`idCategoria`,`enunciado`,`alternativaA`,`alternativaB`,`alternativaC`,`alternativaD`,`alternativaCorreta`) VALUES ({$this->idCategoria},'{$this->enunciado}','{$this->alternativaA}','{$this->alternativaB}','{$this->alternativaC}','{$this->alternativaD}','{$this->alternativaCorreta}')";
        }

        return $connection->executa($sql);
    }

    public function delete(): bool
    {
        $connection = new MySQL();
        $sql = "DELETE FROM `pergunta` WHERE `idPergunta` = {$this->idPergunta}";

        return $connection->executa($sql);
    }

    public static function find($idPergunta): Pergunta
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM `pergunta` WHERE `idPergunta` = {$idPergunta}";
        $res = $connection->consulta($sql);
        
        $pergunta = new Pergunta(
            $res[0]["idCategoria"],
            $res[0]["enunciado"],
            $res[0]["alternativaA"],
            $res[0]["alternativaB"],
            $res[0]["alternativaC"],
            $res[0]["alternativaD"],
            $res[0]["alternativaCorreta"]
        );
        $pergunta->setIdPergunta($res[0]["idPergunta"]);

        return $pergunta;
    }

    public static function findall(): array
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM `pergunta`";
        $results = $connection->consulta($sql);
        
        $perguntas = array();
        foreach($results as $res) {
            $pergunta = new Pergunta(
                $res["idCategoria"],
                $res["enunciado"],
                $res["alternativaA"],
                $res["alternativaB"],
                $res["alternativaC"],
                $res["alternativaD"],
                $res["alternativaCorreta"]
            );
            $pergunta->setIdPergunta($res["idPergunta"]);
            $perguntas[] = $pergunta;
        }

        return $perguntas;
    }

    public static function getNumeroDePerguntas(): int
    {
        $connection = new MySQL();
        $sql = "SELECT COUNT(1) AS qtdePerguntas FROM `pergunta`";
        $results = $connection->consulta($sql);
        
        return $results[0]["qtdePerguntas"];
    }

    public function getNomeCategoria(): string
    {
        $connection = new MySQL();
        $sql = "SELECT C.nome AS `nome` FROM `perguntacategoria` C WHERE `idCategoria` = {$this->idCategoria}";
        $results = $connection->consulta($sql);

        return $results[0]["nome"];
    }

    public static function sorteioPergunta(): Pergunta
    {
        $connection = new MySQL();
        $indice = rand(1, self::getNumeroDePerguntas());
        $sql = "SELECT * FROM (SELECT ROW_NUMBER() OVER (ORDER BY idPergunta) AS indice, idPergunta, idCategoria, enunciado, alternativaA, alternativaB, alternativaC, alternativaD, alternativaCorreta FROM pergunta) P WHERE indice = {$indice}";
        $res = $connection->consulta($sql);

        $pergunta = new Pergunta(
            $res[0]["idCategoria"],
            $res[0]["enunciado"],
            $res[0]["alternativaA"],
            $res[0]["alternativaB"],
            $res[0]["alternativaC"],
            $res[0]["alternativaD"],
            $res[0]["alternativaCorreta"]
        );
        $pergunta->setIdPergunta($res[0]["idPergunta"]);

        return $pergunta;
    }
}