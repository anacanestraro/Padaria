<?php
    // Criação da classe que gerencia a conexão com o banco 
    class Banco {
        private $host = 'localhost'; // Qual servidor o banco de dados está hospedado
        private $dbname = 'padaria'; // Nome do banco
        private $username = 'root'; // Nome do usuário do banco
        private $password = ''; // Senha do usuário
        private $conexao; // Variável que armazenará a conexão com o banco

        // Método construtor
        public function __construct() {     
            // Cria uma instancia da classe PDO estabelecendo uma conexão com o banco,
            // seguindo o padrão da string que deve ser passada para criar um objeto PDO
            // atribui o objeto criado à variavel conexao
            $this->conexao = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
        }

        // Get pra pegar a conexao
        public function getConexao() {
            return $this->conexao;
        }
    }

?>