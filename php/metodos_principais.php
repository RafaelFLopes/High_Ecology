<?php
include_once 'conectar.php';

class metodos_principais {
    private $nome_aluno;
    private $cpf_aluno;
    private $email_aluno;
    private $senha_aluno;
    private $forma_pagamento_aluno;
    private $plano_aluno;

    private $imagem;
    
    private $nome_editar_aluno;
    private $cpf_editar_aluno;
    private $email_editar_aluno;
    private $senha_editar_aluno;

    private $email_professor;
    private $senha_professor;

    private $nome_editar_professor;
    private $email_editar_professor;
    private $senha_editar_professor;



    public function getImagePath() {
        return $this->imagem;
    }

    public function setImagePath($caminhoImagem) {
        $this->imagem = $caminhoImagem;
    }
    


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

    public function setFormaPagamentoAluno($forma_pagamento_aluno) {
        $this->forma_pagamento_aluno = $forma_pagamento_aluno;
    }

    // Getters e Setters para $email_aluno
    public function getFormaPagamentoAluno() {
        return $this->forma_pagamento_aluno;
    }

    public function setPlanoAluno($plano_aluno) {
        $this->plano_aluno = $plano_aluno;
    }

    // Getters e Setters para $email_aluno
    public function getPlanoAluno() {
        return $this->plano_aluno;
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


    public function getNomeEditarAluno(){
        return $this->nome_editar_aluno;
    }
    public function setNomeEditarAluno($nome_editar_aluno){
         $this->nome_editar_aluno = $nome_editar_aluno;
    }

    public function getEmailEditarAluno(){
        return $this->email_editar_aluno;
    }
    public function setEmailEditarAluno($email_editar_aluno){
         $this->email_editar_aluno = $email_editar_aluno;
    }

    public function getCpfEditarAluno(){
        return $this->cpf_editar_aluno;
    }
    public function setCpfEditarAluno($cpf_editar_aluno){
         $this->cpf_editar_aluno = $cpf_editar_aluno;
    }

    public function getSenhaEditarAluno(){
        return $this->senha_editar_aluno;
    }
    public function setSenhaEditarAluno($senha_editar_aluno){
         $this->senha_editar_aluno = $senha_editar_aluno;
    }

    public function getNomeEditarProfessor(){
        return $this->nome_editar_professor;
    }
    public function setNomeEditarProfessor($nome_editar_professor){
         $this->nome_editar_professor = $nome_editar_professor;
    }

    public function getEmailEditarProfessor(){
        return $this->email_editar_professor;
    }
    public function setEmailEditarProfessor($email_editar_professor){
         $this->email_editar_professor = $email_editar_professor;
    }

    public function getSenhaEditarProfessor(){
        return $this->senha_editar_professor;
    }
    public function setSenhaEditarProfessor($senha_editar_professor){
         $this->senha_editar_professor = $senha_editar_professor;
    }

    // Método LOGIN
    public function login()
    {
        try {
            $this->conn = new Conectar();
            

            $sql = $this->conn->prepare("SELECT Cod_Aluno, 'aluno' AS tabela FROM aluno WHERE Email = ? AND Senha = ?");
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
        $sqlAluno = $this->conn->prepare("INSERT INTO aluno (Nome, CPF, Email, Senha, Imagem, Matriculado) VALUES (?, ?, ?, ?, ?, ?)");
        $nome = $this->getNomeAluno();
        $cpf = $this->getCpfAluno();
        $senha = $this->getSenhaAluno();
        $imagem = $this->getImagePath();
        $matriculado = 1;
        
        $sqlAluno->bindParam(1, $nome, PDO::PARAM_STR);
        $sqlAluno->bindParam(2, $cpf, PDO::PARAM_STR);
        $sqlAluno->bindParam(3, $email, PDO::PARAM_STR);
        $sqlAluno->bindParam(4, $senha, PDO::PARAM_STR);
        $sqlAluno->bindParam(5, $imagem, PDO::PARAM_STR);
        $sqlAluno->bindParam(6, $matriculado, PDO::PARAM_STR);

        if (!$sqlAluno->execute()) {
            return false; // Retorna se o primeiro INSERT falhar
        }

        // Cadastro na tabela de assinaturas
        $sqlAssinatura = $this->conn->prepare("INSERT INTO assinaturas (Plano, Forma_Pagamento) VALUES (?, ?)");
        $plano = $this->getPlanoAluno();
        $forma_pagamento = $this->getFormaPagamentoAluno();

        $sqlAssinatura->bindParam(1, $plano, PDO::PARAM_STR);
        $sqlAssinatura->bindParam(2, $forma_pagamento, PDO::PARAM_STR);

        if ($sqlAssinatura->execute()) {
            return "registrado"; // Se ambos os INSERTs foram bem-sucedidos
        }

            $this->conn = null;

        } catch (PDOException $exc) {
            echo "Erro ao cadastrar. " . $exc->getMessage();
            return false;
        }
    }

    public function preencherProgresso($Cod_Aluno, $id_do_curso) //método preencherProgresso
    {
        try {
            $this->conn = new Conectar();
    
            // Verifica se já existe um registro com o mesmo Cod_Aluno e id_curso
            $consultaSQL = $this->conn->prepare("SELECT * FROM progresso WHERE Cod_Aluno = $Cod_Aluno AND id_curso = $id_do_curso");
            $consultaSQL->execute();
    
            if ($consultaSQL->rowCount() == 0) { // Se não existir, faz o insert
                $insertSQL = $this->conn->prepare("INSERT INTO progresso (Cod_Aluno, id_curso, status) VALUES ($Cod_Aluno, $id_do_curso, 'visualizado')");
                $insertSQL->execute();
                echo "Progresso cadastrado com sucesso.";
            } else {

                $query = "SELECT data_inicio FROM progresso WHERE Cod_Aluno = '$Cod_Aluno' AND id_curso = '$id_do_curso' ORDER BY data_inicio";
            $result = $this->conn->query($query);
            $passouDias = $result->fetch(PDO::FETCH_ASSOC);
    
            // Fechar conexão
            $this->conn = null;
    
            // Verifica se encontrou uma assinatura
            if ($passouDias) {
                // Converter para objeto DateTime
                $dataInicio = new DateTime($passouDias['data_inicio']);
                $dataAtual = new DateTime();
    
                // Calcular a diferença
                $diferenca = $dataAtual->diff($dataInicio);
    
                // Se passou 1 mês ou mais
                if ($diferenca->days >= 1) {
                    return true;
                }
            }
    
            // Se não houver assinatura registrada ou não passou 1 mês
            return false;
            }
    
            $this->conn = null;
    
        } catch (Exception $exc) {
            echo "Erro ao preencher progresso. " . $exc->getMessage();

        }
    }

    public function cursosIniciado($Cod_Aluno){
        try{

            $this->conn = new Conectar();

            $consultaSQL = $this->conn->prepare("SELECT * FROM progresso WHERE Cod_Aluno = $Cod_Aluno");
            $consultaSQL->execute();
            $result = $consultaSQL->fetchAll();
            
            $numeroDeRegistros = $consultaSQL->rowCount();

            return $numeroDeRegistros;


        }
        catch(PDOException $exc){
            echo "Erro ao verificar. " . $exc->getMessage();
            return false;
        }
    }

    public function cadastroAssinatura($Cod_Aluno)
    {
            try {
            $this->conn = new Conectar();

            // Cadastro na tabela de assinaturas
            $sqlAssinatura = $this->conn->prepare("INSERT INTO assinaturas (Cod_Aluno, Plano, Forma_Pagamento) VALUES (?, ?, ?)");
            $plano = $this->getPlanoAluno();
            $forma_pagamento = $this->getFormaPagamentoAluno();

            $sqlAssinatura->bindParam(1, $Cod_Aluno, PDO::PARAM_STR);
            $sqlAssinatura->bindParam(2, $plano, PDO::PARAM_STR);
            $sqlAssinatura->bindParam(3, $forma_pagamento, PDO::PARAM_STR);

            if ($sqlAssinatura->execute()) {
                return true; // Se ambos os INSERTs foram bem-sucedidos
            }

                $this->conn = null;

            } catch (PDOException $exc) {
                echo "Erro ao cadastrar. " . $exc->getMessage();
                return false;
            }
    }
    
    public function renovarAssinatura($Cod_Aluno)
    {
        try {
            $this->conn = new Conectar();

            // Cadastro na tabela de assinaturas
            $sqlAssinatura = $this->conn->prepare("INSERT INTO assinaturas (Cod_Aluno, Plano, Forma_Pagamento) VALUES (?, ?, ?)");
            $plano = $this->getPlanoAluno();
            $forma_pagamento = $this->getFormaPagamentoAluno();

            $sqlAssinatura->bindParam(1, $Cod_Aluno, PDO::PARAM_STR);
            $sqlAssinatura->bindParam(2, $plano, PDO::PARAM_STR);
            $sqlAssinatura->bindParam(3, $forma_pagamento, PDO::PARAM_STR);

            // Verifica o sucesso do INSERT antes de continuar
            if ($sqlAssinatura->execute()) {
                // Atualiza a matrícula do aluno
                $sqlUpdate = $this->conn->prepare("UPDATE aluno SET Matriculado = 1 WHERE Cod_Aluno = :Cod_Aluno");
                $sqlUpdate->bindParam(':Cod_Aluno', $Cod_Aluno, PDO::PARAM_INT);

                // Executa o UPDATE e verifica o sucesso
                if ($sqlUpdate->execute()) {
                    $this->conn = null; // Fecha a conexão
                    return true; // Se ambos os INSERT e UPDATE foram bem-sucedidos
                } else {
                    throw new PDOException("Erro ao atualizar a matrícula do aluno.");
                }
            } else {
                throw new PDOException("Erro ao cadastrar a assinatura.");
            }
        } catch (PDOException $exc) {
            echo "Erro ao cadastrar. " . $exc->getMessage();
            return false;
        }
    }
    
    public function passouUmMesDesdeUltimaAssinatura($Cod_Aluno)
    {
        try {
            $this->conn = new Conectar();
    
            // Consulta para pegar apenas a última assinatura
            $query = "SELECT Data_Assinatura FROM assinaturas WHERE Cod_Aluno = '$Cod_Aluno' ORDER BY Data_Assinatura DESC LIMIT 1";
            $result = $this->conn->query($query);
            $ultimaAssinatura = $result->fetch(PDO::FETCH_ASSOC);
    
            // Fechar conexão
            $this->conn = null;
    
            // Verifica se encontrou uma assinatura
            if ($ultimaAssinatura) {
                // Converter para objeto DateTime
                $dataAssinatura = new DateTime($ultimaAssinatura['Data_Assinatura']);
                $dataAtual = new DateTime();
    
                // Calcular a diferença
                $diferenca = $dataAtual->diff($dataAssinatura);
    
                // Se passou 1 mês ou mais
                if ($diferenca->m >= 1 || $diferenca->y > 0) {
                    // Atualizar o campo 'matriculado' para false na tabela 'alunos'
                    $this->conn = new Conectar();
                    $updateQuery = "UPDATE aluno SET matriculado = 0 WHERE Cod_Aluno = :Cod_Aluno";
                    $stmt = $this->conn->prepare($updateQuery);
                    $stmt->bindParam(':Cod_Aluno', $Cod_Aluno, PDO::PARAM_INT);
                    $stmt->execute();
    
                    // Fechar conexão
                    $this->conn = null;
    
                    // Retornar true, pois o campo foi atualizado
                    return true;
                }
            }
    
            // Se não houver assinatura registrada ou não passou 1 mês
            return false;
    
        } catch (PDOException $exc) {
            echo "Erro ao verificar assinatura: " . $exc->getMessage();
            return false;
        }
    }


    // Método para buscar informações do aluno por ID
    public function getAlunoPorId($id)
    {
        try {
            $this->conn = new Conectar();
            
            // Prepara a consulta SQL
            $sql = $this->conn->prepare("SELECT Cod_Aluno AS 'cod_aluno', Nome AS 'nome', Senha AS 'senha', Email AS 'email', CPF AS 'cpf', Imagem AS 'img', Matriculado AS 'matriculado' FROM aluno WHERE Cod_Aluno = ?");
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
                    'matriculado' => $resultado['matriculado'],
                    'cod_aluno' => $resultado['cod_aluno']
                ]; // Retorna os dados no formato desejado
            }

            return false; // Se não encontrou nada, retorna false

        } catch (PDOException $exc) {
            echo "Erro ao consultar. " . $exc->getMessage();
            return false;
        }
    }

    public function verificarModulos($id_curso)
    {
        try {
            // Instancia a conexão com o banco de dados
            $this->conn = new Conectar();

            // Consulta SQL direta (não segura)
            $sql = "SELECT COUNT(*) AS total
                FROM modulos
                WHERE id_curso = $id_curso";

            // Executa a consulta
            $result = $this->conn->query($sql)->fetch(PDO::FETCH_ASSOC);

            // Fecha a conexão com o banco
            $this->conn = null;

            // Verifica se o total de registros é maior ou igual a 3
            return $result['total'] >= 3;

        } catch (PDOException $exc) {
            echo "Erro ao consultar. " . $exc->getMessage();
            return false;
        }
    }
    public function verificarConteudo($id_modulo)
    {
        try {
            // Instancia a conexão com o banco de dados
            $this->conn = new Conectar();

            // Consulta SQL direta (não segura)
            $sql = "SELECT COUNT(*) AS total
                FROM conteudos
                WHERE id_modulo = $id_modulo";

            // Executa a consulta
            $result = $this->conn->query($sql)->fetch(PDO::FETCH_ASSOC);

            // Fecha a conexão com o banco
            $this->conn = null;

            // Verifica se o total de registros é maior ou igual a 3
            return $result['total'] >= 1;

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
    public function editarPerfil($id, $nome, $email, $cpf, $senha){
    try {
        $this->conn = new Conectar();
        $tabela = $_SESSION["user"]['tabela'];
        // Verifica se a tabela é "aluno" ou "professor" e executa a atualização
        if ($tabela == 'aluno') {
            $sql = $this->conn->prepare("UPDATE aluno SET Nome = ?, Email = ?, CPF = ?, Senha = ? WHERE Cod_Aluno = ?");
            $sql->bindParam(1, $nome);
            $sql->bindParam(2, $email);
            $sql->bindParam(3, $cpf);
            $sql->bindParam(4, $senha);
            $sql->bindParam(5, $id);
        } else if ($tabela == 'professor') {
            $sql = $this->conn->prepare("UPDATE professor SET Nome = ?, Email = ?, Senha = ? WHERE Cod_Adm = ?");
            $sql->bindParam(1, $nome);
            $sql->bindParam(2, $email);
            $sql->bindParam(3, $senha);
            $sql->bindParam(4, $id);
        }

        $sql->execute();
        $this->conn = null;

        return true;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return false;
    }
}
}
?>
