<?php
include_once 'conectar.php';

class metodos_principais {
    private $nome_aluno;
    private $cpf_aluno;
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

    // Getters e Setters para $cpf_aluno
    public function getCpfAluno() {
        return $this->cpf_aluno;
    }

    public function setCpfAluno($cpf_aluno) {
        $this->cpf_aluno = $cpf_aluno;
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
            
            // Verificação na tabela de aluno
            $sql = $this->conn->prepare("SELECT COD_Aluno, 'aluno' AS tabela FROM aluno WHERE Email = ? AND Senha = ?");
            @$sql->bindParam(1, $this->getEmailAluno(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSenhaAluno(), PDO::PARAM_STR);
            $sql->execute();

            $result = $sql->fetch();

            if ($result == true) {
                $this->conn = null;
                return [
                    'tabela' => $result['tabela'],
                    'id' => $result['Cod_Aluno']
                ]; // Retorna "aluno" e o ID do aluno
            }

            // Caso não seja encontrado, verifica na tabela de professor
            $sql = $this->conn->prepare("SELECT Cod_Adm, 'professor' AS tabela FROM professor WHERE Email = ? AND Senha = ?");
            @$sql->bindParam(1, $this->getEmailProfessor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSenhaProfessor(), PDO::PARAM_STR);
            $sql->execute();

            $result = $sql->fetch();
            $this->conn = null;

            if ($result == true) {
                return [
                    'tabela' => $result['tabela'],
                    'id' => $result['Cod_Adm']
                ]; // Retorna "professor" e o ID do professor
            }

            return false; // Se não encontrou nada, retorna false

        } catch (PDOException $exc) {
            echo "Erro ao consultar. " . $exc->getMessage();
            return false;
        }
    }


    // Método LOGOUT
    public function logout()
    {
        try{
                // Inicia a sessão caso ainda não tenha sido iniciada
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                // Limpa todos os dados da sessão
                session_unset();
                session_destroy();

                // Redireciona para a página de login
                header("Location: ../index.html");
                exit();
        }catch (PDOException $exc) {
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
            $sql = $this->conn->prepare("INSERT INTO aluno (Nome, CPF, Email, Senha) VALUES (?, ?, ?, ?)");
            $nome = $this->getNomeAluno();  // Armazena o valor de getNomeAluno em uma variável
            $cpf = $this->getCpfAluno();  // Armazena o valor de getNomeAluno em uma variável
            $senha = $this->getSenhaAluno();  // Armazena o valor de getSenhaAluno em uma variável
            $sql->bindParam(1, $nome, PDO::PARAM_STR);
            $sql->bindParam(2, $cpf, PDO::PARAM_STR);
            $sql->bindParam(3, $email, PDO::PARAM_STR); // Aqui já usa a variável $email
            $sql->bindParam(4, $senha, PDO::PARAM_STR); // Aqui já usa a variável $senha

            if ($sql->execute()) {
                return "registrado"; // Se cadastrado com sucesso
            }

            $this->conn = null;

        } catch (PDOException $exc) {
            echo "Erro ao cadastrar. " . $exc->getMessage();
            return false;
        }
    }

    // Método para buscar informações do aluno por ID
    public function getAlunoPorId($id)
    {
        try {
            $this->conn = new Conectar();
            
            // Prepara a consulta SQL
            $sql = $this->conn->prepare("SELECT Cod_Aluno AS 'cod_aluno', Nome AS 'nome', Senha AS 'senha', Email AS 'email', CPF AS 'cpf', Imagem AS 'img', Cod_Curso AS 'cod_curso', Cod_Plano AS 'cod_plano' FROM aluno WHERE Cod_Aluno = ?");
            @$sql->bindParam(1, $id, PDO::PARAM_INT);
            $sql->execute();

            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
            $this->conn = null; // Fecha a conexão

            if ($resultado) {
                return [
                    'senha' => $resultado['senha'],
                    'nome' => $resultado['nome'],
                    'email' => $resultado['email'],
                    'cpf' => $resultado['cpf'],
                    'img' => $resultado['img'],
                    'cod_curso' => $resultado['cod_curso'],
                    'cod_plano' => $resultado['cod_plano'],
                    'cod_aluno' => $resultado['cod_aluno']
                ]; // Retorna os dados no formato desejado
            }

            return false; // Se não encontrou nada, retorna false

        } catch (PDOException $exc) {
            echo "Erro ao consultar. " . $exc->getMessage();
            return false;
        }
    }

    // Método para buscar informações do professor por ID
    public function getProfessorPorId($id)
    {
        try {
            $this->conn = new Conectar();
            
            // Prepara a consulta SQL
            $sql = $this->conn->prepare("SELECT Cod_Adm AS 'cod_adm', Senha AS 'senha', Nome AS 'nome', Email AS 'email' FROM professor WHERE Cod_Adm = ?");
            @$sql->bindParam(1, $id, PDO::PARAM_INT);
            $sql->execute();

            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
            $this->conn = null; // Fecha a conexão

            if ($resultado) {
                return [
                    'senha' => $resultado['senha'],
                    'nome' => $resultado['nome'],
                    'email' => $resultado['email'],
                    'cod_adm' => $resultado['cod_adm']
                ]; // Retorna os dados no formato desejado
            }

            return false; // Se não encontrou nada, retorna false

        } 
        catch (PDOException $exc) {
            echo "Erro ao consultar. " . $exc->getMessage();
            return false;
        }
    }
}
?>