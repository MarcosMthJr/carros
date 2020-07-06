<h1 align="center">Gerenciamento Veicular :blue_car: </h1>
<h2>Descrição do Projeto</h2>
<p align="justify">Basicamente é um sistema que possui uma tabela de carros e podemos manipular as informações dessa tabela através da uma API criada em PHP</p>
<!-- foto do projeto  --->
<img src="https://github.com/MarcosMthJr/testeConvesWeb/blob/master/readmeImg/demo.gif?raw=true"/>

### Tabela de Conteúdos
  * [Principais tecnologias usadas](#principais-tecnologias-usadas)
  * [Principais funcionalidades](#principais-funcionalidades)
  * [Como rodar a aplicação](#como-rodar-a-aplicação)
  * [Rotas da API](#rotas-da-api)
  

### Principais tecnologias usadas
<img src="https://img.shields.io/static/v1?label=PHP&message=language&color=blue&style=for-the-badge"/>

<img src="https://img.shields.io/static/v1?label=JAVASCRIPT&message=language&color=yellow&style=for-the-badge&logo=JS"/>

<img src="https://img.shields.io/static/v1?label=HTML5&message=markup_language&color=red&style=for-the-badge&logo=html"/>

<img src="https://img.shields.io/static/v1?label=CSS3&message=style_sheet&color=cian&style=for-the-badge&logo=CSS"/>

<img src="https://img.shields.io/static/v1?label=BOOTSTRAP4&message=framework&color=purple&style=for-the-badge&logo=BOOTSTRAP"/>

### Principais funcionalidades
- :blue_car: Inserir carro ao banco de dados
- :blue_car: Listar os carros
- :blue_car: Pesquisar carro por id

> Status do Projeto: Concluido :heavy_check_mark:

## Como rodar a aplicação
- No terminal navegue até o diretório onde ficam seus projetos dentro do seu apache e clone o projeto do GitHub
```shell
git clone git@github.com:MarcosMthJr/testeConvesWeb.git
```
- Entre na pasta do projeto
```shell
cd testeConvesWeb
```
<p>OBS: Caso tenha feito o download do repositório pelo zip, renomeie a pasta descompactada para <b>testeConvesWeb</b></p>

- No terminal digite o comando do composer para instalar as depêndencias da aplicação.
```shell
composer install
```
- Acesse o seu Administrador de banco de dados
  - Por exemplo, o phpmyadmin.
  - No seu navegador digite:
    ```shell
      localhost/phpmyadmin
    ```
- Faça a importação do banco de dados do arquivo <p>/testeConvesWeb/bancoDeDados/bancoDeDados.sql</p> no seu banco de dados local.

- Modifique os valores das constantes no arquivo de configuração (src/Config.php) para acessar ao banco de dados.
    ```shell
      define( 'DB_HOST', 'localhost' );
      define( 'DB_USER', 'root' );
      define( 'DB_PASSWORD', '' );
      define( 'DB_NAME', 'convesWeb');
    ```

- Para executar a aplicação digite no seu navegador o endereço abaixo
   ```shell
       localhost/testeConvesWeb/
    ```

## Rotas da API
 <p>Rota para inserir um carro</p>
 Method: <b>POST</b>
 
      localhost/testeConvesWeb/carro
 
<p>Rota para listar todos os carros</p>
 Method: <b>GET</b>
 
      localhost/testeConvesWeb/carro
  
<p>Rota para buscar por um carro especificando o id</p>
 Method: <b>GET</b>

      localhost/testeConvesWeb/carro/{$id} 

