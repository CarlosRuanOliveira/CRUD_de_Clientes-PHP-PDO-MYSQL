<?php
namespace App\Entity;
use \App\Db\Database;
use \PDO;

class Cliente{
    
    public $clienteId;
    public $cpf;
    public $nome;
    public $telefone;
    public $email;
    public $sexo;
    public $uf;
    public $cidade;
    public $nascimento;

    /**
     * Cadastra um novo cliente no BD
     * @return boolean
     */
    public function cadastrar()
    {
        $obDatabase = new Database('Cliente');
        
        $this->clienteId = $obDatabase->insert([
                                                'cpf'       => $this->cpf,
                                                'nome'      => $this->nome,
                                                'telefone'  => $this->telefone,
                                                'email'     => $this->email,
                                                'sexo'      => $this->getSexo(),
                                                'uf'        => $this->getUf(),
                                                'cidade'    => $this->getCidade(),
                                                'nascimento'=> $this->getNasc()
                                            ]);
        return true;
    }

    /**
     * Atualiza dados de um cliente
     */
    public function atualizar()
    {
        //$obDatabase = new Database('Cliente');
        
        return (new Database('Cliente'))->update($this->clienteId, [
                                            'cpf'       => $this->cpf,
                                            'nome'      => $this->nome,
                                            'telefone'  => $this->telefone,
                                            'email'     => $this->email,
                                            'sexo'      => $this->getSexo(),
                                            'uf'        => $this->getUf(),
                                            'cidade'    => $this->getCidade(),
                                            'nascimento'=> $this->getNasc()
                                            ]);
    }
    /**
     * Exclui um cliente
     */
    public function excluir()
    {
        return (new Database('Cliente'))->delete($this->clienteId);
    }

    /**
     * Método responsável por obter as vagas do BD
     * @var string $where
     * @var string $order
     * @var string $limit
     * @return array
     */
    public static function getClientes($where = null, $order = null, $limit = null)
    {
        return (new Database('Cliente'))->select($where = null, $order = null, $limit = null)
                                        ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Busca uma vaga de acordo com o id
     * @param int $clienteId
     * @return Cliente
     */
    public static function getCliente($clienteId)
    {
        return (new Database('Cliente'))->select('clienteId = ' . $clienteId)
                                        ->fetchObject(self::class);
    }

    //Getters and Setters
    public function getClienteId()
    {
        return $this->clienteId;
    }
    public function setClienteId($clienteId)
    {
        $this->clienteId = $clienteId;
    }

    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($telefone)
    {
        return $this->telefone = $telefone;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSexo()
    {
        if (!empty($this->sexo)) {
            return $this->sexo;
        } else {
            return null;
        }
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getUf()
    {
        if (!empty($this->uf)) {
            return $this->uf;
        } else {
            return null;
        }
    }
    public function setUf($uf)
    {
        return $this->uf = $uf;
    }

    public function getCidade()
    {
        if (!empty($this->cidade)) {
            return $this->cidade;
        } else {
            return null;
        }
    }
    public function setCidade($cidade)
    {
        return $this->cidade = $cidade;
    }

    public function getNasc()
    {
        if (!empty($this->nascimento)) {
            return $this->nascimento;
        } else {
            return null;
        }
    }
    public function setNascimento($nascimento)
    {
        return $this->nascimento = $nascimento;
    }
}