<?php

require __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . '/src/Model/Carro.php';
require_once __DIR__ . '/src/Controller/CarroController.php';
use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);
//rota get na pagina inicial para a pagina da inicial da aplicação
$router->group(null);
$router->get("/", function ($data) {
include __DIR__.'/src/View/paginaInicial.php';
 
});

//rota get que retorna os carros do bando de dados
$router->get("/carro", function ($data) {
    
    $ctrlCAr = new CtrlCarro(); 
    $carsFound = $ctrlCAr->listCars();
    
    if($carsFound == true){
        http_response_code(200);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($carsFound);
    }
    else{
        http_response_code(404);
    }
 
});

// rota post para inserir o carro no banco de dados
$router->post("/carro", function ($data) {
    
    $car = new Carro($data['modelo'], $data['ano'], $data['marca'], $data['potencia'], $data['valor']);
   
    $ctrlCAr = new CtrlCarro(); 
    $insertDB = $ctrlCAr->insertCar($car);
    
    if($insertDB > 0 ){
        http_response_code(201);
        header('Content-Type: application/json; charset=utf-8');
       echo json_encode("insertID : $insertDB");
    }elseif($insertDB == 'encontrado'){
        http_response_code(403);
        exit;
        
    }
    else{
        http_response_code(400);
    }
 
});


// rota get com parametro id, que retorna o carro com o id que foi passado como 
// parametro
$router->get("/carro/{id}", function ($data) {
    
    $ctrlCAr = new CtrlCarro(); 
    $searchDB = $ctrlCAr->searchCar($data['id']);
    
    if($searchDB == true){
        http_response_code(200);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($searchDB);
    }else{
        http_response_code(404);
    }
 
});


// rota de erro, se caso o usuário for para uma pagina que não existe
// essa rota de erro entrara em ação
$router->group("error");
$router->get("/{errcode}", "Coffee:notFound");

$router->dispatch();

/*
 *redireciona todos os erros
 */
if ($router->error()) {
    echo"<h1>Error: {$router->error()}
    <br>Essa página não existe, volte para a <a href='http://localhost/testeConvesWeb/'>pagina inicial</a>
    </h1>";
}