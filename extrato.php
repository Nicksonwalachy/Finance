<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extrato de Transações</title>
    <!-- Inclua os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Extrato de Transações</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexão com o banco de dados (substitua pelas suas credenciais)
                $host = 'localhost';
                $dbname = 'simple_finance';
                $username = 'root';
                $password = 'senha1';

                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Consulta para obter as transações
                    $sql = "SELECT id, data, descricao, valor FROM transacoes order by data";
                    $stmt = $pdo->query($sql);

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>{$row['data']}</td>";
                        echo "<td>{$row['descricao']}</td>";
                        echo "<td>R$ {$row['valor']}</td>";
                        echo "<td>";
                        echo "<a href='editar_transacao.php?id={$row['id']}' class='btn btn-warning'>Editar</a>";
                        echo "<a href='excluir_transacao.php?id={$row['id']}' class='btn btn-danger ml-2'>Excluir</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
