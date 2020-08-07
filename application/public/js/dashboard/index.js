PessoasAjudadas = {

    url: "http://localhost:8000/listar-pessoas-ajudadas",
    lista: [],

    requisitar: function () {
        $.ajax({
            type: 'GET',
            url: this.url,
            //        data: {}, // serializes the form's elements.
            dataType: "json",
            success: function (response) {
                pessoasAjudadas.lista = response;
                // implements here $.each para prepend HTML into Peoples.json
            }
        });
    },

    listar : function () {
        $(this.lista).each(function (chave, pessoa) {
            console.log(pessoa.nome);
        });
    },

    mostrar : function (nome) {

    }
};


