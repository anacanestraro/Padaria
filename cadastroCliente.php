<?php
    // Realizar o cadastro de um cliente
    require 'Banco.php';
    require 'Cliente.php';

    $banco = new Banco();
    $conexao = $banco->getConexao(); // Recebe a conexão na variável conexao

    $cliente = new Cliente($conexao); // Instancia um objeto da classe Cliente passando a conexao como parâmetro será usado para executar as querys
    
    // Chamando os métodos setters para definir os atributos do novo objeto cliente com os dados que forem enviados atrvés do formulário via método POST
    $cliente->setNome($_POST['nome']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setEmail($_POST['email']);

    // Chama o método create que é o reponsável por executar a query e inserir um novo cliente no banco
    if($cliente->create()){ // Caso o método retorne true
        echo "Cliente cadastrado com sucesso!";
        header ("Refresh:3;url=form_cadastroCliente.php");

    }else { // Caso retorne false
        echo "Erro ao cadastrar o cliente.";
    }


?>