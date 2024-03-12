<?php
    require_once 'init.php';

    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $estilo = isset($_POST['estilo']) ? $_POST['estilo'] : null;
    if (empty($nome)){
        echo "Volte e preencha todos os campos";
        exit;
    }
    
    $PDO = db_connect();
    $sql = "INSERT INTO Banda(nome, estilo) VALUES(:nome, :estilo)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':estilo', $estilo);

    if ($stmt->execute()){
        header('Location: msg-sucesso.html');
    }else{
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>