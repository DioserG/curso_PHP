<?php 

    $conn = new PDO("mysql:dbname=php;host=localhost", "root", "");
    
    $conn->beginTransaction();

    $stmt = $conn->prepare("DELETE FROM tb_usuario WHERE id = ?");
    
    $id = 1;

    $stmt->execute(array($id));
    
    //$conn->rollBack();
    $conn->commit();

	echo "Deletado com Suceso!";
?>