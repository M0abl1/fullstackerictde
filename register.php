<?php
// Iniciar sessão para exibir mensagens de erro ou sucesso
session_start();

// Conectar ao banco de dados
$conn = new mysqli('127.0.0.1', 'root', '', 'loja_bolos');

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Inicializar variáveis para mensagens
$mensagem_sucesso = '';
$mensagem_erro = '';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_usuario = trim($_POST['nome_usuario']);
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    // Validar entradas
    if (empty($nome_usuario) || empty($senha) || empty($confirmar_senha)) {
        $mensagem_erro = 'Todos os campos são obrigatórios.';
    } elseif ($senha !== $confirmar_senha) {
        $mensagem_erro = 'As senhas não correspondem.';
    } elseif (strlen($senha) < 6) {
        $mensagem_erro = 'A senha deve ter pelo menos 6 caracteres.';
    } else {
        // Verificar se o nome de usuário já existe
        $sql = "SELECT id FROM funcionarios WHERE nome_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $nome_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $mensagem_erro = 'O nome de usuário já está em uso.';
        } else {
            // Gerar hash da senha
            $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

            // Inserir novo usuário no banco de dados
            $sql = "INSERT INTO funcionarios (nome_usuario, senha_hash) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $nome_usuario, $senha_hash);

            if ($stmt->execute()) {
                $mensagem_sucesso = 'Usuário registrado com sucesso!';
            } else {
                $mensagem_erro = 'Erro ao registrar o usuário. Tente novamente.';
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
    <title>Registro de Usuário</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        /* Paleta de cores */
        :root {
            --primary: #E88F2A;
            --secondary: #FAF3EB;
            --light: #FFFFFF;
            --dark: #2B2825;
        }

        /* Estilo para centralizar a div */
        .register-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--secondary);
        }

        .register-box {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 8px;
            background-color: var(--light);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--dark);
            border-color: var(--dark);
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        h3 {
            color: var(--dark);
        }

        label,
        .text-center {
            color: var(--dark);
        }
    </style>
</head>

<body>
    <?php include "topbar.php"; ?>
    <div class="register-container">
        <div class="register-box">
            <h3 class="text-center mb-4">Registrar Novo Usuário</h3>
            <?php if ($mensagem_erro): ?>
                <div class="alert alert-danger"><?php echo $mensagem_erro; ?></div>
            <?php endif; ?>
            <?php if ($mensagem_sucesso): ?>
                <div class="alert alert-success"><?php echo $mensagem_sucesso; ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nome_usuario" class="form-label">Nome de Usuário</label>
                    <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" placeholder="Digite seu nome de usuário" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
                </div>
                <div class="mb-3">
                    <label for="confirmar_senha" class="form-label">Confirmar Senha</label>
                    <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" placeholder="Confirme sua senha" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrar</button>
            </form>
            <div class="mt-3 text-center">
                <a href="login.php" style="color: var(--primary);">Já tem uma conta? Faça login</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>