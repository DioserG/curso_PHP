<?php 

	$conn = new PDO("mysql:dbname=php;host=localhost", "root", "");

	$stmt = $conn->prepare("INSERT INTO tb_usuario (nome, idade) VALUES(:NOME, :IDADE)");

	$nome = "Dioser";
	$idade = 28;

	$stmt->bindParam(":NOME", $nome);
	$stmt->bindParam(":IDADE", $idade);

	$stmt->execute();

	echo "Inserido com Suceso!";
?>