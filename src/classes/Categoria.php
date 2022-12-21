<?php

namespace classes;

use db\ActiveRecord;
use db\MySQL;


class Categoria implements ActiveRecord
{
    private int $idCategoria;

    public function __construct(private string $nome)
    {
    }

    /**
     * @param int $idCategoria
     */
    public function setIdCategoria(int $idCategoria): void
    {
        $this->idCategoria = $idCategoria;
    }

    /**
     * @return int
     */
    public function getIdCategoria(): int
    {
        return $this->idCategoria;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    public function save(): bool
    {
        // TODO: Implement save() method.
        return false;
    }

    public function delete(): bool
    {
        // TODO: Implement delete() method.
        return false;
    }

    public static function find($id): Categoria
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM perguntacategoria WHERE idCategoria = {$id}";
        $res = $connection->consulta($sql);

        $categoria = new Categoria($res[0]["nome"]);
        $categoria->setIdCategoria($res[0]["idCategoria"]);

        return $categoria;
    }

    public static function findNomeCategoriaPeloId($id): string
    {
        $connection = new MySQL();
        $sql = "SELECT nome FROM perguntacategoria WHERE idCategoria = {$id}";
        $res = $connection->consulta($sql);

        return $res[0]["nome"];
    }

    public static function findall(): array
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM perguntacategoria";
        $res = $connection->consulta($sql);

        $categorias = array();
        foreach ($res as $row) {
            $categoria = new Categoria($row["nome"]);
            $categoria->setIdCategoria($row["idCategoria"]);
            $categorias[] = $categoria;
        }

        return $categorias;
    }
}