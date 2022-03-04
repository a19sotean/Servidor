<?php

namespace App\Models;

use PDO;
use PDOException;

abstract class DBAbstractModel
{
    private static $db_host = HOST;
    private static $db_user = USER;
    private static $db_pass = PASS;
    private static $db_name = BD_NAME;
    private static $db_port = PORT;

    protected $message = '';
    protected $connection; // Manejador de la BD

    //Manejo básico para consultas consultas.
    protected $query; //consulta
    protected $parameters = array(); //parámetros de entrada
    protected $rows = array(); //array con los datos de salida

    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    protected function open_connection()
    {
        $dsn = 'mysql:host=' . self::$db_host . ';'
            . 'dbname=' . self::$db_name . ';'
            . 'port=' . self::$db_port;
        try {
            $this->connection = new PDO(
                $dsn,
                self::$db_user,
                self::$db_pass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            return $this->connection;
        } catch (PDOException $e) {
            printf("Conexión fallida: %s\n", $e->getMessage());
            exit();
        }
    }

    public function lastInsert()
    {
        return $this->connection->lastInsertId();
    }

    private function close_connection()
    {
        $this->connection = null;
    }
    protected function get_results_from_query()
    {
        $this->open_connection();
        if (($_stmt = $this->connection->prepare($this->query))) {
            if (preg_match_all('/(:\w+)/', $this->query, $_named, PREG_PATTERN_ORDER)) {
                $_named = array_pop($_named);
                foreach ($_named as $_param) {
                    $_stmt->bindValue($_param, $this->parameters[substr($_param, 1)]);
                }
            }

            try {
                if (!$_stmt->execute()) {
                    printf("Error de consulta: %s\n", $_stmt->errorInfo()[2]);
                }

                $this->rows = $_stmt->fetchAll(PDO::FETCH_ASSOC);
                $_stmt->closeCursor();
            } catch (PDOException $e) {
                printf("Error en consulta: %s\n", $e->getMessage());
            }
        }
        // $this->close_connection();

    }

    abstract protected function read();
    abstract protected function readAll();
    abstract protected function insert();
    abstract protected function update();
    abstract protected function delete();
}
