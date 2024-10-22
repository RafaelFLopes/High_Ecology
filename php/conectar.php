<?php

class conectar extends PDO // A classe 'conectar' herda da classe PDO, responsável pela conexão com o banco de dados
{
    private static $instancia;
    private $query; // Armazena a query SQL que será executada
    private $host = "127.0.0.1"; // Endereço do servidor de banco de dados
    private $usuario = "root"; // Nome de usuário do banco de dados
    private $senha = ""; // Senha do banco de dados (Não possui)
    private $db = "highecology"; // Nome do banco de dados

    public function __construct()  // Construtor da classe, chama o construtor da classe PDO passando as credenciais
    { 
        parent::__construct("mysql:host=$this->host;dbname=$this->db", "$this->usuario", "$this->senha"); // Chama o construtor da classe PDO para estabelecer a conexão com o banco de dados
    }
    public static function getInstance(){  // Método estático que retorna a única instância da classe
        if(!isset(self::$instancia)){// Verifica se a instância já existe
            try {
                self::$instancia = new conectar();
                echo 'Conectado com sucesso!!!';
            } 
            catch(Exception $e){
                echo 'Erro ao conectar';
                exit();
            }
        }
        return self::$instancia;
    }
    public function sql($query) // Método para executar uma consulta SQL
    {
        $this->getInstance(); // Garante que a instância da conexão esteja criada
        $this->query = $query; // Atribui a consulta SQL à variável $query
        $pdo = null; // Não é totalmente necessário, visto que tem maneiras mais otimizadas. 
        $stmt = $this->prepare($this->query);
        $stmt->execute();
    }
}

?>