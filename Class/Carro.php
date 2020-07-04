<?php

require_once '../config/PdoClass.php';

class Carro {

    private $id;
    private $modelo;
    private $ano;
    private $marca;
    private $potencia;
    private $valor;

    public function __construct($id, $modelo, $ano, $marca, $potencia, $valor) {
        $this->setId($id);
        $this->setModelo($modelo);
        $this->setAno($ano);
        $this->setMarca($marca);
        $this->setPotencia($potencia);
        $this->setValor($valor);
        
    }
    
    public function falar() {
        echo "{$this->getId()}, {$this->getAno()}";
    }

  /*  public function insertCar() {
        $conn = Database::conexao();
        $sql = "INSERT INTO carro(modelo, ano, marca, potencia, valor) values (?,?,?,?,?)";

        $stmt = $conn->prepare($sql);

        try {
            $stmt->bindValue(1, $this->getModelo());
            $stmt->bindValue(2, $this->getAno());
            $stmt->bindValue(3, $this->getMarca());
            $stmt->bindValue(4, $this->getPotencia());
            $stmt->bindValue(5, $this->getValor());
            $stmt->execute();

            // se deu certo, manda o json do ultimo registo para inserir no array da lista
            // se der errado, mandar o erro via json e o codigo do status da requisição que deu ruim
        } catch (PDOException $ex) {
            echo 'Erro ao conectar no banco!' . $ex;
        }
    }*/

    function getId() {
        return $this->id;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getAno() {
        return $this->ano;
    }

    function getMarca() {
        return $this->marca;
    }

    function getPotencia() {
        return $this->potencia;
    }

    function getValor() {
        return $this->valor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setPotencia($potencia) {
        $this->potencia = $potencia;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

}
