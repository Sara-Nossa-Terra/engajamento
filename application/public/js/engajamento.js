/**
 * Classe para forçar preenchimento de números inteiros.
 *
 * @author Douglas Santana <douglasantana007@gmail.com>
 * @since 22-02-2020
 */
$('input.inteiro').keyup(function () {
    $($(this)).val($(this).val().replace(/[^0-9]/g, ''));
});
