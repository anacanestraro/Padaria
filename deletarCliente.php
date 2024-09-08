<?php

    require("Banco.php");
    require("Cliente.php");

    $banco = new Banco(); // Instancia um objeto da classe Banco 
    $conexao = $banco->getConexao(); // Atribui a conexão do objeto banco à variável conexao

    $cliente = new Cliente($conexao); // Instancia um objeto da classe cliente passsando conexao como parâmetro

    // Com o método setId difine o atributo id através do método GET
    $cliente->setId($_GET['id']);

    // Chama o método delete que é responsável por executar a query que deleta um cliente do banco
    if($cliente->delete()){ // Caso o método retorne true
        echo "Cliente deletado com sucesso!";
        header("Refresh:3;url=listarCliente.php");
    }else{ // Caso o método retorne false
        echo "Erro ao deletar cliente.";
    }


?>