<?php
include_once 'conectar.php';

class metodos_principais
{
    private $nome_aluno;
    private $email_aluno;
    private $senha_aluno;

    private $email_professor;
    private $senha_professor;


    // Getters e Setters para $nome_aluno
    public function getNomeAluno() {
        return $this->nome_aluno;
    }

    public function setNomeAluno($nome_aluno) {
        $this->nome_aluno = $nome_aluno;
    }

    // Getters e Setters para $email_aluno
    public function getEmailAluno() {
        return $this->email_aluno;
    }

    public function setEmailAluno($email_aluno) {
        $this->email_aluno = $email_aluno;
    }

    // Getters e Setters para $senha_aluno
    public function getSenhaAluno() {
        return $this->senha_aluno;
    }

    public function setSenhaAluno($senha_aluno) {
        $this->senha_aluno = $senha_aluno;
    }

    // Getters e Setters para $email_professor
    public function getEmailProfessor() {
        return $this->email_professor;
    }

    public function setEmailProfessor($email_professor) {
        $this->email_professor = $email_professor;
    }

    // Getters e Setters para $senha_professor
    public function getSenhaProfessor() {
        return $this->senha_professor;
    }

    public function setSenhaProfessor($senha_professor) {
        $this->senha_professor = $senha_professor;
    }

    // Método LOGIN
    public function login()
    {
        try {
            $this->conn = new Conectar();
            
            // Verificação na tabela de responsável
            $sql = $this->conn->prepare("SELECT * FROM aluno WHERE Email = ? AND Senha = ?");
            @$sql->bindParam(1, $this->getEmailAluno(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSenhaAluno(), PDO::PARAM_STR);
            $sql->execute();

            $result = $sql->fetch();

            if ($result == true) {
                $this->conn = null;
                return "aluno"; // Se encontrou um responsável, retorna "responsavel"
            }

            // Caso não seja encontrado, verifica na tabela de médico
            $sql = $this->conn->prepare("SELECT * FROM professor WHERE Email = ? AND Senha = ?");
            @$sql->bindParam(1, $this->getEmailProfessor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSenhaProfessor(), PDO::PARAM_STR);
            $sql->execute();

            $result = $sql->fetch();
            $this->conn = null;

            if ($result == true) {
                return "professor"; // Se encontrou um médico, retorna "medico"
            }

            return false; // Se não encontrou nada, retorna false

        } catch (PDOException $exc) {
            echo "Erro ao consultar. " . $exc->getMessage();
            return false;
        }
    }


    // Método CADASTRO
    public function cadastro()
    {
        try {
            $this->conn = new Conectar();
            
            // Verificação se o e-mail já existe
            $sqlVerifica = $this->conn->prepare("SELECT COUNT(*) as total FROM aluno WHERE Email = ?");
            $email = $this->getEmailAluno(); // Armazena o valor de getEmailAluno em uma variável
            $sqlVerifica->bindParam(1, $email, PDO::PARAM_STR);
            $sqlVerifica->execute();
            $resultado = $sqlVerifica->fetch(PDO::FETCH_ASSOC);

            if ($resultado['total'] > 0) { //Caso o resultado da verficação for maior que 0, significa que já consta o email no bd
                return ""; //TEMPORARIO
            }

            // Cadastro do aluno
            $sql = $this->conn->prepare("INSERT INTO aluno (Nome, Email, Senha) VALUES (?, ?, ?)");
            $nome = $this->getNomeAluno();  // Armazena o valor de getNomeAluno em uma variável
            $senha = $this->getSenhaAluno();  // Armazena o valor de getSenhaAluno em uma variável
            $sql->bindParam(1, $nome, PDO::PARAM_STR);
            $sql->bindParam(2, $email, PDO::PARAM_STR); // Aqui já usa a variável $email
            $sql->bindParam(3, $senha, PDO::PARAM_STR); // Aqui já usa a variável $senha

            if ($sql->execute()) {
                return "registrado"; // Se cadastrado com sucesso
            }

            $this->conn = null;

        } catch (PDOException $exc) {
            echo "Erro ao cadastrar. " . $exc->getMessage();
            return false;
        }
    }  
}
?>
