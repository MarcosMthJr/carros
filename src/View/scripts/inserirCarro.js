"use strict";
window.addEventListener("load", function (event) {
  const camposModal = this.document.querySelectorAll(".inputModal");
  const btnModalClose =  this.document.querySelector(".btnModalClose");
 



  /** função para verificar se os campos estão vazios */
  function verificarCampos() {
    let idVerificacao = 1;
    camposModal.forEach(element => {
      if ((element.value == '') || (element.value.length === 0) ||
        (element.value.trim().length === 0)) {
        idVerificacao = 0;
        return;
      }
    })
    if (idVerificacao == 1) {
      return 1;
    } else {
      return 0;
    }
  }
  function limparCampos (){
    camposModal.forEach(element => {
      element.value = '';
    })
  }

  /**  manipulando formulário  */
  document.formInsertCar.onsubmit = e => {
    e.preventDefault();

      if (verificarCampos() == 1) {
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

  async function inserirCarro(e, idTipoPessoa) {
    const form = e.target;
    const data = new FormData(form);
    const options = {
      method: 'POST',
      body: new URLSearchParams(data)
    }
    const API = 'http://localhost/testeConvesWeb/carro/';
    let post = await fetch(API, options);
    let resp = await post.json();
    console.log(resp);
    console.log(`codigo do status:  ${post.status}`);
    if ((post.status == 201)) {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Carro inserido com sucesso',
        showConfirmButton: false,
        timer: 5000
      })
      limparCampos();
      btnModalClose.click();
      // realizar busca do id retornado e adicionar a lista 

    } else if ((post.status == 403)) {
      Swal.fire({
        icon: 'error',
        title: 'Erro ao inserir carro',
        text: 'Verifique suas informações e tente novamente',
      })
    } else if ((post.status >= 500) && (post.status <= 599)) {
      Swal.fire({
        icon: 'error',
        title: 'Erro Fatal',
        text: 'Entre em contato com o proprietário do site',
      })
    }

    return resp.id;
  }
});
