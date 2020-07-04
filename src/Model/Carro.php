<?php

require_once 'src/Controller/CarroController.php';
class Carro {

    private $id;
    private $modelo;
    private $ano;
    private $marca;
    private $potencia;
    private $valor;

    public function __construct($modelo, $ano, $marca, $potencia, $valor) {

        $this->setModelo($modelo);
        $this->setAno($ano);
        $this->setMarca($marca);
        $this->setPotencia($potencia);
        $this->setValor($valor);
    }


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
