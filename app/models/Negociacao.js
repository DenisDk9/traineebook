class Negociacao {
    
    constructor(nome) {
        
        this._nome = nome;
        Object.freeze(this);
    }
    

    insereNome(){
        alert("Inserindo nome no banco de dados");
        alert (this._nome);
    }

}