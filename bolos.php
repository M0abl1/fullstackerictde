<?php
// Conectar ao banco de dados
$conn = new mysqli('127.0.0.1', 'root', '', 'loja_bolos');

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consultar bolos cadastrados
$sql = "SELECT * FROM bolos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolos Cadastrados</title>
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

        .bolo-item {
            display: flex;
            background-color: var(--light);
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 10px;
        }

        .bolo-item img {
            width: 100%;
            height: auto;
            max-width: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        .bolo-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: start;
            padding: 10px 20px;
            background-color: var(--secondary);
            border-radius: 8px;
        }

        .bolo-info h5 {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .bolo-info span {
            font-size: 1rem;
            color: var(--dark);
        }

        .bolo-item .flex-shrink-0 {
            max-width: 150px;
        }

        .bg-primary {
            background-color: var(--primary) !important;
        }

        .text-primary {
            color: var(--primary) !important;
        }

        .text-dark {
            color: var(--dark) !important;
        }

        h2,
        h4 {
            color: var(--dark);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Bolos Cadastrados</h2>

        <?php if ($resultado->num_rows > 0): ?>
            <div class="row">
                <?php while ($bolo = $resultado->fetch_assoc()): ?>
                    <div class="col-lg-6">
                        <div class="bolo-item">
                            <div class="flex-shrink-0">
                                <img src="<?php echo $bolo['imagem_url']; ?>" alt="<?php echo $bolo['nome']; ?>">
                            </div>
                            <div class="bolo-info">
                                <h5 class="text-uppercase"><?php echo $bolo['nome']; ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-dark">Nenhum bolo cadastrado.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>