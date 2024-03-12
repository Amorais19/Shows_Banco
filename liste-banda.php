<?php
    require_once 'init.php';
    $PDO = db_connect();
    $sql = "SELECT id, nome, estilo FROM Banda ORDER BY nome ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="styles.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Shows</title>
</head>

<body>
    <header>
        <h3 class="title">Shows.com</h3>
        <a class="menu" href="index.html">Início</a>
    </header>
    <main>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Listagem de bandas:</h1>
                <p>Listagem de todas as bandas cadastradas.</p>
            </div>
        </div>
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Estilo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($nome = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <th scope="row"><?php echo $tipo['id'] ?></th>
                            <td><?php echo $tipo['descricaoTipo'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="form-edit-tipo.php?id=<?php echo $tipo['id'] ?>">Editar</a>
                                <a class="btn btn-danger" href="deleteTipo.php?id=<?php echo $tipo['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>