<?php

namespace Alura\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    // sqlite
    // public static function createConnection(): PDO
    // {
    //     $databasePath = __DIR__ . '/../../../banco.sqlite';
    //     $connection = new PDO('sqlite:' . $databasePath);
    //     // habilita pdo a lancar as excecoes, por padrao vem silencioso
    //     // PDO::ATTR_ERRMODE existem outros modos
    //     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //     // definindo o FETCH_ASSOC como retorno padrao das consultas
    //     $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //     return $connection;
    // }

    // mysql
    public static function createConnection(): PDO
    {
        $connection = new PDO('mysql:host=localhost;dbname=alurapdo', 'root', '1q2w3e4r');
        // habilita pdo a lancar as excecoes, por padrao vem silencioso
        // PDO::ATTR_ERRMODE existem outros modos
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // definindo o FETCH_ASSOC como retorno padrao das consultas
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}