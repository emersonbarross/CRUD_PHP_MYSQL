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

    public static function consultaGeral()
    {
        $stmt = $this->conn->prepare('CALL SP_CONSULTA_GERAL()');
        $stmt->execute();
        $consulta = $stmt->fetchall(PDO::FETCH_ASSOC);
        echo json_encode($consulta);
    }

    public function update($acpf, $acod, $ncpf = NULL, $ncod)
    {
        if(is_null($ncpf))
        {
            $ncpf = $acpf;
        }
        $stmt = $this->conn->prepare('CALL SP_UPDATE(:A_CPF, :A_COD, :N_CPF, :N_COD)');

        $stmt->bindparam(':A_CPF', $acpf);
        $stmt->bindparam(':A_COD', $acod);
        $stmt->bindparam(':N_CPF', $ncpf);
        $stmt->bindparam(':N_COD', $ncod);

        $stmt->execute();
        echo "ATUALIZADO";
    }
}


?>