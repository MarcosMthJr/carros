"use strict";
window.addEventListener("load", function (event) {
  const camposModal = this.document.querySelectorAll(".inputModal");
  const campoId = this.document.querySelector("#inputId");
  const btnModalClose = this.document.querySelector(".btnModalClose");
  const tableBody = document.querySelector('.corpoTabela');
  const btnRefresh  = document.querySelector("#btn-refreshTable");
  btnRefresh.addEventListener('click', listCars);
  listCars();

  /** função para verificar se os campos estão vazios */
  function verificarCampos(inputForm) {
    let idVerificacao = 1;
    if (inputForm.length > 1) {
      inputForm.forEach(element => {
        if ((element.value == '') || (element.value.length === 0) ||
          (element.value.trim().length === 0)) {
          idVerificacao = 0;
          return;
        }
      })
    } else {
      if ((inputForm.value == '') || (inputForm.value.length === 0) ||
        (inputForm.value.trim().length === 0)) {
        idVerificacao = 0;
        return;
      }
    }
    if (idVerificacao == 1) {
      return 1;
    } else {
      return 0;
    }
  }
  function limparCampos() {
    camposModal.forEach(element => {
      element.value = '';
    })
  }

//formulario responsável por realizar o post do carro 
  document.formInsertCar.onsubmit = e => {
    e.preventDefault();
    if (verificarCampos(camposModal) == 1) {
      let timerInterval;
      Swal.fire({
        title: 'Realizando cadastro...',
        timerProgressBar: true,
        onBeforeOpen: () => {
          Swal.showLoading()
          timerInterval = setInterval(() => {
            const content = Swal.getContent()
            if (content) {
              const b = content.querySelector('b')
              if (b) {
                b.textContent = Swal.getTimerLeft()
              }
            }
          })
        },
        onClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {

        }
      })

      inserirCarro(e);

    } else {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Preencha todos os campos',
      })
    }


  }

  //formulario responsável por realizar a pesquisa por id
  document.searchCar.onsubmit = e => {
    e.preventDefault();
    if (verificarCampos(inputId) == 1) {
      searchCar(campoId.value)
    } else {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Preencha o campo com o ID do carro que deseja encontrar',
      })
    }

  }


  // função para inserir carro
  async function inserirCarro(e) {
    const form = e.target;
    const data = new FormData(form);
    const options = {
      method: 'POST',
      body: new URLSearchParams(data)
    }
    const API = 'http://localhost/testeConvesWeb/carro';
    let post = await fetch(API, options);
    if ((post.status == 201)) {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Carro inserido com sucesso',
        showConfirmButton: false,
        timer: 5000
      })
      listCars();
      limparCampos();
      btnModalClose.click();
    } else if ((post.status == 403)) {
      Swal.fire({
        icon: 'error',
        title: 'Erro ao inserir carro',
        text: 'Esse carro já existe ',
      })
    } else if ((post.status >= 500) && (post.status <= 599)) {
      Swal.fire({
        icon: 'error',
        title: 'Erro Fatal',
        text: 'Entre em contato com o proprietário do site',
      })
    }
  }


  //função para listar carros  
  async function listCars() {
    tableBody.innerHTML = "<h1>Carregando...</h1>";
    const API = 'http://localhost/testeConvesWeb/carro';
    let getCars = await fetch('http://localhost/testeConvesWeb/carro');
    if (getCars.status == 200) {
     
      let resp = await getCars.json();
      const tableRow = car => `<tr>
        <th>${car.id}</th>
        <td>${car.modelo}</td>
        <td>${car.marca}</td>
        <td>${car.potencia}</td>
        <td>${car.ano}</td>
        <td>${car.valor}</td></tr>`
      const carList = resp.map(tableRow);
      tableBody.innerHTML = carList;
    } else if ((getCars.status == 404)) {
      Swal.fire({
        icon: 'error',
        title: 'Erro ao alimentar tabela',
        text: 'Parace que você não possui nenhum carro em seu sistema',
      })
    } else if ((getCars.status >= 500) && (getCars.status <= 599)) {
      Swal.fire({
        icon: 'error',
        title: 'Erro Fatal',
        text: 'Entre em contato com o proprietário do site',
      })
    }

  }

  //função para pesquisar carros
  async function searchCar(id) {
    let timerInterval = 200;
    Swal.fire({
      title: 'Realizando busca...',
      timerProgressBar: true,
      onBeforeOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
          const content = Swal.getContent()
          if (content) {
            const b = content.querySelector('b')
            if (b) {
              b.textContent = Swal.getTimerLeft()
            }
          }
        })
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (result.dismiss === Swal.DismissReason.timer) {

      }
    })
    const API = `http://localhost/testeConvesWeb/carro/${id}`;
    let foundCar = await fetch(API);
    if (foundCar.status == 200) {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Carro encontrado com sucesso',
        showConfirmButton: false,
        timer: 2000
      })
      let car = await foundCar.json();
      const searchRow =  `<tr>
        <th>${car.id}</th>
        <td>${car.modelo}</td>
        <td>${car.marca}</td>
        <td>${car.potencia}</td>
        <td>${car.ano}</td>
        <td>${car.valor}</td></tr>`;
      tableBody.innerHTML = searchRow;
    } else if ((foundCar.status == 404)) {
      Swal.fire({
        icon: 'error',
        title: 'Erro ao realizar busca',
        text: 'Não foi encontrado nenhum carro com o id preenchido',
      })
      tableBody.innerHTML = "";
    } else if ((foundCar.status >= 500) && (getCars.status <= 599)) {
      Swal.fire({
        icon: 'error',
        title: 'Erro Fatal',
        text: 'Entre em contato com o proprietário do site',
      })
    }

  }
});


