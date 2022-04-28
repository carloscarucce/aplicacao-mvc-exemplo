<?php

namespace Curso\AplicacaoMvcExemplo;

use PDO;

class PDOFactory
{
    private static $conexoes = [];

    /**
     * @param string $nome
     * @return PDO
     */
    public static function create(string $nome) : PDO
    {
        if (!isset(self::$conexoes[$nome])) {
            $dados = parse_ini_file(__DIR__.'/../configs/conexoes.ini', true);

            $dsn = $dados[$nome]['dsn'];
            $user = $dados[$nome]['user'];
            $password = $dados[$nome]['password'];

            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            self::$conexoes[$nome] = $pdo;
        }

        return self::$conexoes[$nome];
    }
}