class NegociacaoController {

    constructor(){
        this._inputQuantidade = document.querySelector('#nomeE');
    }

    
    adiciona(event){
        //isso é pra não recarregar a página, ele cancela a submissão do formulario e captura os dados
        event.preventDefault();

       //let negociacao = new Negociacao(this._inputQuantidade.value);
         
       $.ajax({
        //O onde vai ser passado os dados pelo ajax
        url: 'grava.php',
        //Tipo de envio, nesse caso é post, ou seja, não é pelo url
        type: 'post',
        //
        dataType: 'html',
        //O dado que será enviado
        data: {
            'nome': this._inputQu
            
   
        }
    }).done(function(data){
        
        alert(data);
        
    });

        alert("dneywbydbe3w");
        console.log(this._inputQuantidade.value);
    }
}