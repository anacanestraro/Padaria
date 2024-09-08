<?php

    require 'Banco.php';
    require 'Cliente.php';

    $banco = new Banco(); // Instacia um objeto da classe Banco
    $conexao = $banco->getConexao(); // Atribui à variável conexão a conexão do objeto banco
    $cliente = new Cliente($conexao); // Instahncia um objeto da classe Cliente passando a conexao como parâmetro

    $cliente->setId($_GET['id']); // Com o método setId difine o atributo id através do método GET 
    $stmt = $cliente->consultar(); // Atribui à variável stmt o resultado do método consultar que é responsável por realizar uma consulta no banco de dados através do id
    $clienteSelecionado = $stmt->fetch(PDO::FETCH_ASSOC); // Atribui à variável clienteSelecionado os dados recuperado pelo fetch que retorna os resultados em um array associativo

?>
<!-- Form para atualizar o cliente -->
<form method="POST" action="atualizaCliente.php"> 
    <input type="hidden" name="id" value="<?php echo $clienteSelecionado['id']; ?>"> <!-- Usando um campo escondido para enviar o id junto com o form -->
    Nome: <input type="text" name="nome" value="<?php echo $clienteSelecionado['nome']; ?>"> <!-- Os campos são preenchidos através do echo -->
    Telefone: <input type="text" name="telefone" value="<?php echo $clienteSelecionado['telefone']; ?>">
    Email: <input type="email" name="email" value="<?php echo $clienteSelecionado['email']; ?>">
    CPF: <input type="text" name="cpf" value="<?php echo $clienteSelecionado['cpf']; ?>">
    <input type="submit" value="Atualizar">
</form>