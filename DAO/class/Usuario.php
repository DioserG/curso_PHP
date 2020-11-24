<?php

class Usuario
{
    private $id;
    private $nome;
    private $idade;

    public function getIdusuario()
    {
        return $this->id;
    }

    public function setIdusuario($value)
    {
        $this->id = $value;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($value)
    {
        $this->nome = $value;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($value)
    {
        $this->idade = $value;
    }
 
    public function loadById($id)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuario WHERE id = :ID", array(
            ":ID"=>$id
        ));

        if(isset($results) > 0)
        {
            $row = $results[0];

            $this->setData($results[0]);
        }
    }

    public static function getList()
    {
        $sql = new Sql();

        return  $sql->select("SELECT * FROM tb_usuario ORDER BY nome");
    }

    public static function search($nome)
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuario WHERE nome LIKE :SEARCH ORDER BY nome", array(
            ':SEARCH'=>"%".$nome."%"
        ));
    }

    public function login($nome, $idade)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuario WHERE nome = :NOME AND idade = :IDADE", array(
            ":NOME"=>$nome,
            ":IDADE"=>$idade
        ));

        if(isset($results) > 0)
        {
            $row = $results[0];

            $this->setData($results[0]);
        }else
        {
            throw new Exception("Nome ou Idade não estão corretos");
        }
    }

    public function setData($data)
    {
        $this->setIdusuario($data['id']);
        $this->setNome($data['nome']);
        $this->setIdade($data['idade']);
    }

    public function insert()
    {
        $sql = new Sql();

        $results = $sql->select("CALL sp_usuarios_insert(:NOME, :IDADE)", array(
            ':NOME'=>$this->getNome(),
            ':IDADE'=>$this->getIdade()
        ));
        if(count($results) > 0)
        {
            $this->setData($results[0]);
        }
    }

    public function __construct($nome = "", $idade = "")
    {
        $this->setNome($nome);
        $this->setIdade($idade);
    }

    public function update($nome, $idade)
    {
        $this->setNome($nome);
        $this->setIdade($idade);

        $sql = new Sql();

        $sql->query("UPDATE tb_usuario SET nome = :NOME, idade = :IDADE WHERE id = :ID",  array(
            ':NOME'=>$this->getNome(),
            ':IDADE'=>$this->getIdade(),
            'ID'=>$this->getIdusuario()
        ));
    }

    public function __toString()
    {
        return json_encode(array(
            "id"   =>$this->getIdusuario(),
            "nome" =>$this->getNome(),
            "idade"=>$this->getIdade()
        ));
    }
}

?>  