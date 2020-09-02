<?php

class Model
{
    private $conn;

    public function __construct()
    {
            $this->conn = new PDO("mysql:dbname=computadores;host=localhost","root","1826");
            //$this->conn = new PDO("sqlsrv:database=computadores;server:localhost\sqlexpress;connectionpooling=0","","");
    }

    public function insere($cpf, $nome, $sexo, $cod, $modelo, $marca)
    {
        $stmt = $this->conn->prepare('CALL SP_INSERE(:CPF, :NOME, :SEXO, :COD, :MODELO, :MARCA)');

        $stmt->bindparam(':CPF', $cpf);
        $stmt->bindparam(':NOME', $nome);
        $stmt->bindparam(':SEXO', $sexo);
        $stmt->bindparam(':COD', $cod);
        $stmt->bindparam(':MODELO', $modelo);
        $stmt->bindparam(':MARCA', $marca);

        $stmt->execute();

        echo "INSERIDO COM SUCESSO.";
    }

    public function consultaGeral()
    {
        $stmt = $this->conn->prepare('CALL SP_CONSULTA()');
        $consulta = $stmt->execute();
        echo $consulta;
    }
}


?>