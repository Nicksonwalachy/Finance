<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$host = 'localhost';
$dbname = 'simple_finance';
$username = 'root';
$password = 'senha1';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recupere os dados do formulário
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $dia = $_POST['data'];

    // Insira a transação no banco de dados
    $sql = "INSERT INTO transacoes (descricao, valor, data) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$descricao, $valor, $dia]);
    

    // Redirecione para a página de extrato
    header('Location: extrato.php');
    exit;
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>