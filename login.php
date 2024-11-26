<?php
// Iniciar sessão
session_start();

// Conectar ao banco de dados
$conn = new mysqli('127.0.0.1', 'root', '', 'loja_bolos');

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Variável para armazenar mensagens de erro
$erro = '';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_usuario = trim($_POST['nome_usuario']);
    $senha = $_POST['senha'];

    // Consulta ao banco de dados para buscar o usuário
    $sql = "SELECT id, senha_hash FROM funcionarios WHERE nome_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $nome_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // Verificar se a senha fornecida corresponde ao hash armazenado
        if (password_verify($senha, $usuario['senha_hash'])) {
            // Login bem-sucedido: salvar dados na sessão
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nome_usuario'] = $nome_usuario;

            // Redirecionar para a página protegida
            header('Location: admin.php');
            exit;
        } else {
            $erro = 'Senha incorreta.';
        }
    } else {
        $erro = 'Usuário não encontrado.';
    }
}
?>

<?php include "loginhead.php";  ?>

<body>
    <?php include "topbar.php"; ?>
    <div class="login-container">
        <div class="login-box">
            <h3 class="text-center mb-4">Login</h3>
            <?php if ($erro): ?>
                <div class="alert alert-danger"><?php echo $erro; ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nome_usuario" class="form-label">Usuário</label>
                    <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" placeholder="Digite seu usuário" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
            <div class="mt-3 text-center">
                <a href="register.php">Não tem uma conta? Registre-se</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>