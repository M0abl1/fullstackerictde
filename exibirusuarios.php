<?php
// Conectar ao banco de dados
$conn = new mysqli('127.0.0.1', 'root', '', 'loja_bolos');

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consultar os funcionários cadastrados
$sql = "SELECT * FROM funcionarios"; // Tabela de funcionários
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários Cadastrados</title>
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

        .container {
            background-color: var(--light);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: var(--dark);
        }

        .table th,
        .table td {
            text-align: center;
            color: var(--dark);
        }

        .table {
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
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Funcionários Cadastrados</h2>

        <?php if ($resultado->num_rows > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome de Usuário</th>
                        <th>Senha Hash</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($funcionario = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $funcionario['id']; ?></td>
                            <td><?php echo $funcionario['nome_usuario']; ?></td>
                            <td><?php echo $funcionario['senha_hash']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center text-dark">Nenhum funcionário cadastrado.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>