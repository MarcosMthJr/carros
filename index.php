<?php

require __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . '/src/Model/Carro.php';
require_once __DIR__ . '/src/Controller/CarroController.php';

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->group(null);
$router->get("/", function ($data) {
include __DIR__.'/src/View/paginaInicial.php';
 
});
    
$router->get("/carro", function ($data) {
    
    $ctrlCAr = new CtrlCarro(); 
    $carsFound = $ctrlCAr->listCars();
    
    if($carsFound == true){
        http_response_code(200);
        echo json_encode($carsFound);
    }else{
        http_response_code(404);
    }
 
});



$router->post("/carro/", function ($data) {
    
    $car = new Carro($data['modelo'], $data['ano'], $data['marca'], $data['potencia'], $data['valor']);
   
    $ctrlCAr = new CtrlCarro(); 
    $insertDB = $ctrlCAr->insertCar($car);
    
    if($insertDB > 0 ){
        http_response_code(201);
        echo json_encode("insertID : $insertDB");
    }else{
        http_response_code(403);
    }
 
});


    
$router->get("/carro/{id}", function ($data) {
    
    $ctrlCAr = new CtrlCarro(); 
    $searchDB = $ctrlCAr->searchCar($data['id']);
    
    if($searchDB == true){
        http_response_code(200);
        echo json_encode($searchDB);
    }else{
        http_response_code(404);
    }
 
});



$router->group("error");
$router->get("/{errcode}", "Coffee:notFound");

$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    echo"<h1>Deu M: {$router->error()}</h1>";
}