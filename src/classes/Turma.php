<?php

namespace classes;

use db\MySQL;

class Turma
{
    public ?int $idTurma;
    public string $turma;
    public function __construct(
    ) { }

    #region idTurma
    public function setIdTurma(?int $idTturma): void
    {
        $this->idTurma = $idTurma;
    }

    public function getIdTurma(): int | null
    {
        return $this->idTurma;
    }
    #endregion

    #region turma
    public function setTurma(string $turma): void
    {
        $this->turma = $turma;
    }

    public function getTurma(): string
    {
        return $this->turma;
    }
    #endregion


    public static function find($id): Turma
    {
        $conexao = new MySQL();
        $sql = "SELECT * FROM turmameliante WHERE idTurmaMeliante = {$id}";
        $resultado = $conexao->consulta($sql);
        $u = new Turma();
        if (!is_null($resultado[0]['idTurmaMeliante'])) {
            $u->setIdTurma($resultado[0]['idTurmaMeliante']);
            $u->setTurma($resultado[0]['nome']);
        } else {
            $u->setIdTurma(null);
        }
        return $u;
    }

}