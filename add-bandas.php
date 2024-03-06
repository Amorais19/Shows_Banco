<?php
    require_once 'init.php';

    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    if (empty($nome)){
        echo "Volte e preencha todos os campos";
        exit;
    }
    $PDO = db_connect();
    $sql = "INSERT INTO bandas(nomeBanda) VALUES(:nome)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);

    if ($stmt->execute()){
        header('Location: msgSucesso.html');
    }else{
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>