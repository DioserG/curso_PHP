<?php

require_once("config.php");

//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM tb_usuario");
//echo json_encode($usuarios);

//Carrega um usuário
//$dioser = new Usuario();
//$dioser->loadById(1);
//echo $dioser;

//Carrega todos usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega uma lista de usuários buscando pelo nome
//$search = Usuario::search("Dio");
//echo json_encode($search);

//carrega usuário pelo nome e idade
//$usuario = new Usuario();
//$usuario->login("Dioser","28");
//echo $usuario;

//INSERT via procedure
//$aluno = new Usuario("Dioser", "28");
//$aluno->setNome("Goncalves");
//$aluno->setIdade("29");
//$aluno->insert();
//echo $aluno;

//Update
$usuario = new Usuario();
$usuario->loadById(11);
$usuario->update("Pedro", 37);
echo $usuario;
?>