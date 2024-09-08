<?php
    // Criar a classe Cliente
    class Cliente {
        private $conexao;
        private $id;
        private $nome;
        private $telefone;
        private $email;
        private $cpf;

        // Construtor pra criar um objeto da classe Cliente com o parâmetro $db
        public function __construct($db){
            $this->conexao = $db;
        }

        // Setters
        public function setId($id){
            $this->id = $id;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function setEmail($email){
            $this->email = $email;
        }      

        // Método pra criar um cliente e adicionar na tabela cliente do banco de dados 
        public function create(){
            // Criação de uma query para inserir os dados na tabela
            $query = "INSERT INTO cliente SET nome=:nome,cpf=:cpf, telefone=:telefone, email=:email";
            // Utilizando a função prepare da classe PDO para preparar a query 
            // Criando uma declaração que será usada para executar a query no banco de dados
            $stmt = $this->conexao->prepare($query);

            // Utilizando o bind pra substituir o atributo indicado na $query pela variável
            $stmt->bindParam(":nome",$this->nome);
            $stmt->bindParam(":telefone",$this->telefone);
            $stmt->bindParam(":email",$this->email);
            $stmt->bindParam(":cpf",$this->cpf);
            
            // Executar a query preparada e caso seja executado normalmente retorna true, se ocorrer algum erro retorna false
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }

        } 
        // Método para listar a tabela cliente
        public function read(){
            // Criação de uma query para selecionar todos os itens na tabela cliente
            $query = "SELECT * FROM cliente";
            // Utilizando a função prepare da classe PDO para preparar a query
            // Criando uma declaração que será usada para executar a query no banco de dados
            $stmt = $this->conexao->prepare($query);

            // Executando a query
            $stmt->execute();

            return $stmt;
        }

        // Método para deletar um cliente da tabela utilizando seu id
        public function delete(){
            // Criação de uma query para deletar da tabela cliente pelo id
            $query = "DELETE FROM cliente WHERE id=:id";
            // Preparando e criando a declaração para executar no banco
            $stmt = $this->conexao->prepare($query);

            // Utilizando a função bind do PDO para substituir o id na query 
            $stmt->bindParam(":id",$this->id);

            // Executando a query
            if($stmt->execute()){
                return true;
            }

            return false;
        }

        // Método para atualizar um cliente pelo seu id
        public function update(){
            // Criação de uma query para atualizar cliente passando seus atributos novos
            $query = "UPDATE cliente SET nome=:nome, telefone=:telefone, email=:email, cpf=:cpf WHERE id=:id";
            // Preparando e criando uma declaração para executar no banco
            $stmt = $this->conexao->prepare($query); 

            // Utilizando a funão bind da classe PDO para substituir os atributos na query
            $stmt->bindParam(":nome",$this->nome);
            $stmt->bindParam(":telefone",$this->telefone);
            $stmt->bindParam(":email",$this->email);    
            $stmt->bindParam(":cpf",$this->cpf);
            $stmt->bindParam(":id", $this->id);

            // Executando a query
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        // Método para consultar um cliente pelo id 
        public function consultar(){
            // Criação de uma query para selecionar um cliente da tabela pelo id
            $query = "SELECT * FROM cliente WHERE id=:id";

            // Preparando e criando uma declaração para executar no banco
            $stmt = $this->conexao->prepare($query);

            // Utilizando a função bind do PDO para substituir o id na query
            $stmt->bindParam(":id",$this->id);

            // Executando a query
            $stmt->execute();

            return $stmt;
        }
    }

?>