<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Gestão Financeira</title>
    <!-- Inclua os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Minha Gestão Financeira</h1>
        <form action="salvar_transacao.php" method="post">
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" id="valor" name="valor" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" id="data" name="data" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Transação</button>
        </form>
    </div>
</body>
</html>
