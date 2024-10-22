<?php
include_once 'conectar.php';

class metodos_principais
{
    private $email_aluno;
    private $senha_aluno;
    private $email_professor;
    private $senha_professor;

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

    // Método de login
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
}
?>
