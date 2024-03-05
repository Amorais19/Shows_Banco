<?php
    require_once 'init.php';
    $PDO = db_connect();
    $sql = "SELECT id, nome FROM Banda ORDER BY nome ASC";
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
                <h1 class="display-3">Cadastrar show:</h1>
                <p>Lembre-se de preencher todos os dados.</p>
            </div>
        </div>
        <div class="container">
            <form>
                <div class="form-group">
                    <label for="selectbanda">Selecione sua banda:</label>
                    <select class="form-control" name="selectbanda" id="selectbanda" required>
                        <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                            <option value=" <?php echo $dados['id'] ?> "> <?php echo $dados['nome'] ?> </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="local">Local do show:</label>
                    <input type="text" class="form-control" id="nomebanda" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="data">Data do show:</label>
                    <input type="date" class="form-control" id="data" placeholder="Data">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a class="btn btn-danger" href="index.html" role="button">Cancelar</a>
            </form>
        </div>
    </main>
</body>

</html>