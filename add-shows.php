<?php
    require_once 'init.php';

    $localShow = isset($_POST['local']) ? $_POST['local'] : null;
    $banda_id = isset($_POST['selectBanda']) ? $_POST['selectBanda'] : null;
    $datas = isset($_POST['dataShow']) ? $_POST['dataShow'] : null;

    if (empty($descricao) || empty($tipo_id) || empty($status)){
        echo "Volte e preencha todos os campos";
        exit;
    }

    $PDO = db_connect();
    $sql = "INSERT INTO shows(localShow, datas, banda_id) VALUES(:localShow, :datas, :banda_id)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':localShow', $localShow);
    $stmt->bindParam(':datas', $datas);
    $stmt->bindParam(':banda_id', $banda_id);

    if ($stmt->execute()){
        header('Location: msgSucesso.html');
    }else{
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>