<?php

    require 'Banco.php';
    require 'Cliente.php';

    $banco = new Banco (); // Instancia um objeto da classe Banco   
    $conexao = $banco->getConexao(); // Atribui a conexão do objeto banco à variável conexao

    $cliente = new Cliente ($conexao); // Instancia um objeto da classe cliente passsando conexao como parâmetro 

    // Chamando os métodos setters para definir os atributos do novo objeto cliente com os dados que forem enviados atrvés do formulário via método POST
    $cliente->setId($_POST['id']);
    $cliente->setNome($_POST['nome']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setEmail($_POST['email']);

    // Chamando o método update que é responsável por executar a query e atualizar os dados de um cliente na tabela do banco
    if($cliente->update()){ // Caso o método retorne true
        echo "Cliente atualizado com sucesso!";
        header ("Refresh:3;url=listarClientes.php");
    } else { // Caso o método retorne false
        echo "Erro ao atualizar cliente";
    }
?>