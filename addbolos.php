<?php
// Conectar ao banco de dados
$conn = new mysqli('127.0.0.1', 'root', '', 'loja_bolos');

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Inicializar variáveis para mensagens
$mensagem_sucesso = '';
$mensagem_erro = '';

// Verificar se o formulário de adição de bolo foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nome']) && isset($_POST['imagem_url'])) {
        $nome = trim($_POST['nome']);
        $imagem_url = trim($_POST['imagem_url']);

        // Validar entradas
        if (empty($nome) || empty($imagem_url)) {
            $mensagem_erro = 'Todos os campos são obrigatórios.';
        } else {
            // Inserir bolo no banco de dados
            $sql = "INSERT INTO bolos (nome, imagem_url) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $nome, $imagem_url);

            if ($stmt->execute()) {
                $mensagem_sucesso = 'Bolo adicionado com sucesso!';
            } else {
                $mensagem_erro = 'Erro ao adicionar o bolo. Tente novamente.';
            }
        }
    }

    // Verificar se o formulário de exclusão foi enviado
    if (isset($_POST['deletar_nome'])) {
        $deletar_nome = trim($_POST['deletar_nome']);

        if (empty($deletar_nome)) {
            $mensagem_erro = 'O nome do bolo é obrigatório para exclusão.';
        } else {
            // Deletar bolo do banco de dados
            $sql = "DELETE FROM bolos WHERE nome = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $deletar_nome);

            if ($stmt->execute()) {
                $mensagem_sucesso = 'Bolo excluído com sucesso!';
            } else {
                $mensagem_erro = 'Erro ao excluir o bolo. Tente novamente.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar e Deletar Bolo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #E88F2A;
            --secondary: #FAF3EB;
            --light: #FFFFFF;
            --dark: #2B2825;
        }

        body {
            background-color: var(--secondary);
            font-family: Arial, sans-serif;
        }

        .center-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--secondary);
        }

        .form-box {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: var(--light);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: var(--dark);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--dark);
            border-color: var(--dark);
        }

        .alert {
            background-color: var(--primary);
            color: var(--light);
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .form-control {
            border-color: var(--dark);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(232, 143, 42, 0.25);
        }

        label {
            color: var(--dark);
        }
    </style>
</head>

<body>
    <div class="center-container">
        <div class="form-box">
            <h3 class="text-center mb-4">Adicionar Novo Bolo</h3>

            <?php if ($mensagem_erro): ?>
                <div class="alert alert-danger"><?php echo $mensagem_erro; ?></div>
            <?php endif; ?>

            <?php if ($mensagem_sucesso): ?>
                <div class="alert alert-success"><?php echo $mensagem_sucesso; ?></div>
            <?php endif; ?>

            <!-- Formulário de Adição de Bolo -->
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Bolo</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do bolo" required>
                </div>
                <div class="mb-3">
                    <label for="imagem_url" class="form-label">URL da Imagem</label>
                    <input type="text" class="form-control" id="imagem_url" name="imagem_url" placeholder="Digite a URL da imagem" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Adicionar</button>
            </form>

            <hr>

            <h3 class="text-center mb-4">Deletar Bolo</h3>

            <!-- Formulário de Exclusão de Bolo -->
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="deletar_nome" class="form-label">Nome do Bolo para Excluir</label>
                    <input type="text" class="form-control" id="deletar_nome" name="deletar_nome" placeholder="Digite o nome do bolo" required>
                </div>
                <button type="submit" class="btn btn-danger w-100">Deletar</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>