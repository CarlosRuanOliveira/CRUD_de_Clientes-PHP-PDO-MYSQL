<?php

namespace App\Db;

use Exception;
use \PDO;
use PDOException;

class Database{
    const HOST = "localhost";
    const DBNAME = "crud_clientes";
    const USER = "root";
    const PASSWD = "";

    private $tableName;
    private $conn;

    /**
     * Executa queries dentro do banco de dados
     * @param string $query
     * @param array $params
     */
    public function execute($query, $params = [])
    {
        try {
            $stm = $this->conn->prepare($query);
            $stm->execute($params);
            return $stm;
        } catch (PDOException $e) {
            die("Erro: ". $e->getMessage());
            //Em um projeto real o erros com banco de dados não seriam exibidos, apenas salvos no log por motivos de segurança.
        }catch (Exception $e) {
            die("Erro genérico: ". $e->getMessage());
        }
    }

    /**
     * Método que insere os dados no BD
     * @param array $values [indice => value]
     * @var array $binds
     * @var array $fields
     */
    public function insert($values = [])
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $sql = "INSERT INTO " . $this->tableName . "(" . implode(', ', $fields) .") values(" . implode(', ', $binds) . ");";

        $this->execute($sql, array_values($values));
        
        return $this->conn->lastInsertId();
    
    }
    /**
     * Método que atualiza dados no BD
     * @param int $where
     * @param array $values
     * @var array $binds
     * @var array $fields
     */
    public function update($where ,$values = [])
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $sql = "UPDATE " . $this->tableName . " SET ". implode('=?, ', $fields) ."=? WHERE clienteId=". $where .";";
        $this->execute($sql, array_values($values));
    }

    /**
     * Método que exclui o cliente do BD
     */
    public function delete($where)
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE clienteId=" . $where . ";";
        $this->execute($sql);
        return true;
    }

    /**
     * Método que realiza uma consulta no banco
     * @var string $where
     * @var string $order
     * @var string $limit
     * @var string $fields
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields='*')
    {
        $where = strlen($where) ? 'WHERE ' . $where: '';
        $order = strlen($order) ? 'ORDER ' . $order: '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit: '';

        $sql = "SELECT ". $fields . " FROM " . $this->tableName . " " . $where . " " . $order . " " . $limit . ";";
        return $this->execute($sql);
    }

    //construct
    public function __construct($tableName = null)
    {
        $this->setTableName($tableName);
        $this->setConn();            
    }

    //Getters and Setters
    public function getTableName()
    {
        return $this->tableName;    
    }
    public function setTableName($tableName)
    {
        return $this->tableName = $tableName;
    }

    public function getConn()
    {
        return $this->tableName;
    }
    public function setConn()
    {
        try {
            $this->conn = new PDO('mysql:host='.self::HOST.'; dbname='.self::DBNAME, self::USER, self::PASSWD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de conexão: ". $e->getMessage());
            //Em um projeto real o erros com banco de dados não seriam exibidos, apenas salvos no log por motivos de segurança.
        }catch (Exception $e) {
            die("Erro genérico: ". $e->getMessage());
        }
    }
}