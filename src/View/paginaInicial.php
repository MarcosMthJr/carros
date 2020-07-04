<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <link rel="stylesheet" href="src/View/css/custom.css">
  <title>Gerenciamento Veicular</title>
</head>
<body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Gerenciamento  Veicular</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" >
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Inserir Novo Carro</button>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>
  </header>
  <main>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Modelo</th>
      <th scope="col">Marca</th>
      <th scope="col">Potência</th>
      <th scope="col">Ano</th>
      <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody class="corpoTabela">
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
    </tr>

  </tbody>
</table>
  </main>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inserir Novo Veículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="formInsertCar">
          <div class="form-row">
              <div class="col-6">
                <input type="text" name="modelo"  class="form-control inputModal" placeholder="Modelo">
              </div>
              <div class="col-6">
                <input type="text" name="marca" class="form-control inputModal" placeholder="Marca">
              </div>
          </div>
          <div class="form-row">
            <div class="col-4">
              <input type="text"  name="potencia" class="form-control inputModal" placeholder="Potência">
            </div>
            <div class="col-4">
              <input type="text"  name="ano" class="form-control inputModal" placeholder="Ano">
            </div>
            <div class="col-4">
              <input type="text"  name="valor" class="form-control inputModal" placeholder="Valor">
            </div>
        </div>
        <div class="modal-footer">
          <span id="warning"></span>
          <button type="button" class="btn btn-secondary btnModalClose" data-dismiss="modal">Fechar</button>
          <input type="submit" class="btn btn-primary" value="Cadastrar">
        </div>
      </form>
    </div>
  </div>
</div>
<script src="src/View/scripts/inserirCarro.js"></script>
</body>

</html>
