/**
 * Classe para forçar preenchimento de números inteiros.
 *
 * @author Douglas Santana <douglasantana007@gmail.com>
 * @since 22-02-2020
 */
$("input.inteiro").keyup(function () {
    $($(this)).val(
        $(this)
            .val()
            .replace(/[^0-9]/g, "")
    );
});

/**
 *
 * Função da lib jquery-mask-plugin que é executada para aplicar
 * uma máscara os campos de data, hora e telefone
 *
 * Caso queira aplicar uma mask de data, use a classe date_input no elemento.
 * A mesma coisa com as outras tags abaixo
 *
 *
 */
$(document).ready(function ($) {
    $(".date_input").mask("00/00/0000");
    $(".time_input").mask("23:00");
    $(".phone_input").mask("(00) 9 0000-0000");
});

/**
 * Filtro da dashboard
 */
$(document).ready(function () {
    const input = document.getElementById("home_search");

    if (input) {
        // atualiza o estado da dom toda vez que o input é editado
        input.onkeyup = (event) => {
            const valorInput = $(input).val();
            const textsEl = document.querySelectorAll(".author-name");

            // mostrar todos os items com a classe .search_identifier
            $(".search_identifier").show();

            textsEl.forEach((el) => {
                if (
                    // oculta item se ele não der match com o texto procurado
                    el.innerHTML
                        .toLowerCase()
                        .indexOf(valorInput.toLowerCase()) < 0
                ) {
                    $(el).parent().parent().parent().parent().parent().hide();
                }
            });
        };
    }
});
