<?php

namespace classes;

use db\MySQL;

class TipoMeliante
{
    public function __construct(
        public int $idTipoMeliante,
        public string $nome
    ) { }

    #region idTipoMeliante
    public function setIdTipoMeliante(int $idTipoMeliante): void
    {
        $this->idTipoMeliante = $idTipoMeliante;
    }

    public function getIdTipoMeliante(): int
    {
        return $this->idTipoMeliante;
    }
    #endregion

    #region nome
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    #endregion


    public static function find($id): TipoMeliante
    {
        $conexao = new MySQL();
        $sql = "SELECT * FROM tipoMeliante WHERE idTipoMeliante = {$id}";
        $resultado = $conexao->consulta($sql);
        $u = new TipoMeliante($resultado[0]['idTipoMeliante'],$resultado[0]['nome']);
        return $u;
    }

}