<?php

namespace classes;

use db\MySQL;

class TipoMeliante
{

    private int $idTipoMeliante;
    private string $nome;

    public function __construct(
    ) {
    }
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
        $sql = "SELECT * FROM tipomeliante WHERE idTipoMeliante = {$id}";
        $resultado = $conexao->consulta($sql);
        $u = new TipoMeliante();
        $u->setIdTipoMeliante($resultado[0]['idTipoMeliante']);
        $u->setNome($resultado[0]['nome']);
        return $u;
    }

}