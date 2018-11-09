class NegociacaoController {

    constructor(){
        this._inputNome = document.querySelector('#nome');
        this._inputEmail = document.querySelector('#email');
        this._inputsenha = document.querySelector('#senha');
        this._inputConfSenha = document.querySelector('#senha-confirmar');

        //sthis._inputsenha = document.querySelector('#senha');


    }

    
    adiciona(event){
        //isso é pra não recarregar a página, ele cancela a submissão do formulario e captura os dados
        event.preventDefault();

        let negociacao = new Negociacao(this._inputNome.value);

        negociacao.insereNome();

        alert(this._inputNome.value);
        console.log(this._inputNome.value);
    }
}