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
    $nome_usuario = $_POST['nome_usuario'];
    $senha = $_POST['senha'];

    // Verifique se o usuário existe e a senha está correta
    $sql = "SELECT id FROM usuarios WHERE nome = ? AND senha = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome_usuario, $senha]);

    if ($stmt->rowCount() > 0) {
        // Usuário autenticado, redirecione para a página principal
        header('Location: pagina_principal.php');
        exit;
    } else {
        echo "Usuário ou senha incorretos.";
    }
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>
