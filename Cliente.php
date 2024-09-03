<?php

    class Cliente {
        private $conexao;
        private $id;
        private $nome;
        private $telefone;
        private $email;
        private $cpf;

        public function __construct($db){
            $this->conexao = $db;
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

        public function create(){
            $query = "INSERT INTO cliente SET nome=:nome,cpf=:cpf, telefone=:telefone, email=:email";
            $stmt = $this->conexao->prepare($query);

            $stmt->bindParam(":nome",$this->nome);
            $stmt->bindParam(":telefone",$this->telefone);
            $stmt->bindParam(":email",$this->email);
            $stmt->bindParam(":cpf",$this->cpf);
            
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }

        } 

        public function read(){
            $query = "SELECT * FROM cliente";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }

?>