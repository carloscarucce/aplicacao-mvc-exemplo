<?php

namespace Curso\AplicacaoMvcExemplo;

use PDO;

abstract class Model
{
    /**
     * @var string
     */
    protected static string $table;

    /**
     * @var string
     */
    protected static string $primaryKey = 'id';

    /**
     * @var array
     */
    protected $dados = [];

    /**
     * @var PDO
     */
    private static PDO $pdo;

    public function &__get(string $name)
    {
        return $this->dados[$name];
    }

    public function __set(string $name, $value): void
    {
        $this->dados[$name] = $value;
    }

    public function __isset(string $name): bool
    {
        return isset($this->dados[$name]);
    }

    /**
     * @return array
     */
    public static function all(): array
    {
        $pdo = self::connect();
        $table = static::$table;

        $result = $pdo->query("SELECT * FROM $table");

        return $result->fetchAll();
    }

    /**
     * @param int $id
     * @return static|null
     */
    public static function load(int $id): ?static
    {
        $pdo = self::connect();
        $table = static::$table;
        $pkColumn = static::$primaryKey;
        $query = "SELECT * FROM $table WHERE $pkColumn = ?";

        $stmt = pdo_select_query($pdo, $query, [$id]);
        if ($stmt->rowCount()) {
            $dados = $stmt->fetch(PDO::FETCH_ASSOC);

            $model = new static();
            foreach ($dados as $coluna => $valor) {
                $model->$coluna = $valor;
            }

            return $model;
        }

        return null;
    }

    /**
     * @return PDO
     */
    private static function connect() : PDO
    {
        if (!isset(self::$pdo)) {
            self::$pdo = PDOFactory::create('mysql');
        }

        return self::$pdo;
    }

    /**
     * @return void
     */
    public function insert()
    {
        $pdo = self::connect();
        $pk = pdo_insert_row($pdo, static::$table, $this->dados);

        $this->dados[static::$primaryKey] = $pk;
    }

    /**
     * @return int|null
     */
    public function update(): ?int
    {
        $pdo = self::connect();
        $pk = $this->dados[static::$primaryKey];

        return pdo_update_row($pdo, static::$table, $this->dados, $pk, static::$primaryKey);
    }

    /**
     * @return int|null
     */
    public function delete(): ?int
    {
        $pdo = self::connect();
        $pk = $this->dados[static::$primaryKey];

        return pdo_delete_row($pdo, static::$table, $pk, static::$primaryKey);
    }
}