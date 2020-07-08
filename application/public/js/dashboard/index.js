
pessoasAjudadas = {
    
    url: null,
    lista: [],
    
    requisitar = function(){
        $.ajax({
            type: 'GET',
            url: this.urlListarPessoasAjudadas,
    //        data: {}, // serializes the form's elements.
            dataType: "json",
            success: function(response){
                pessoasAjudadas.lista = response;
                // implements here $.each para prepend HTML into Peoples.json
            }
        });
    },
    
    listar = function(){
        $(pessoasAjudadas.lista).each(function(chave, pessoa) {
            console.log(pessoa.nome);
        });
    },
    
    mostrar = function(nome){
        
    }
};

linhaPessoaAtividade = {
    Nome: null,
    linha: null,
    
    mostrar: function(){
        
    }

};
