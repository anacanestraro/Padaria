<?php

    require("Banco.php");
    require("Cliente.php");

    $banco = new Banco(); // Instacia um objeto da classe Banco
    $conexao = $banco->getConexao(); // Atribui à variável conexão a conexão do objeto banco

    $cliente = new Cliente($conexao); // Instancia um objeto da classe cliente passsando conexao como parâmetro
    $stmt = $cliente->read();  // Atribui à variável stmt o resultado do método read que é responsável por executar a query que seleciona todos os clientes da tabela
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC); // Atribui à variável clientes os dados recuperado pelo fetchAll que retorna os resultados em um array associativo

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
<!-- Listar os clientes -->
    <h2>Lista de Clientes</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>
        <?php foreach($clientes as $cliente){ ?>
            <tr>
                <td><?php echo $cliente['id']; ?></td>
                <td><?php echo $cliente['nome']; ?></td>
                <td><?php echo $cliente['telefone']; ?></td>
                <td><?php echo $cliente['email']; ?></td>
                <td><?php echo $cliente['cpf']; ?></td>

                <td>
                    <a href="form_atualizarCliente.php?id=<?php echo $cliente['id'];?>">Editar</a>
                    <a href="deletarCliente.php?id=<?php echo $cliente['id'];?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <a href="form_cadastroCliente.php">Cadastrar Novo Cliente</a>

</body>
</html>