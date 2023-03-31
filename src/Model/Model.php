<?php

namespace App\model;

use Dotenv\Dotenv;

/**
 * Class Model
 * @package App\model
 */
abstract class Model
{
    // connection parameters

    private $host;
    private $username;
    private $password;
    private $dbname;

    private static $instance = null;  // connection instance

    /**
     * Model constructor.
     */
    public function __construct() {
        // acceder au fichier .env
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        // recuperer les variables d'environnement
        $this->host = $_ENV['DB_HOST'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->dbname = $_ENV['DB_NAME'];
    }

    /**
      * make a connection to the database and return only one instance (singleton)
      *
      * @return mixed
      */
    private function getDb()
    {
        if (self::$instance === null) {
            $conn = new \PDO(
                "mysql:host=$this->host;
                          dbname=$this->dbname;charset=utf8;",
                $this->username,
                $this->password,
                array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)
            );

            if ($conn) {
                self::$instance = $conn;
                return $conn;
            } else {
                die('connexion impossible !');
            }
        } else {
            return self::$instance;
        }
    }


      /**
     * Execute a query (prepared or direct)
     *
     * @param  string $sql query to execute
     * @param  array $params parameters for inclusion in the query
     * @return ?array|bool result of the query
     */
      protected function executeQuery($sql, $params = null)
      {
          if ($params == null) {
              $result = $this->getDb()->query($sql);    // quick query
          } else {
              $result = $this->getDb()->prepare($sql);  // prepared query
              $result->execute($params);
          }
          return $result;
      }
}
