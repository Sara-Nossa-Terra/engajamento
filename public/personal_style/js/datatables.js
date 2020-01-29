$(document).ready(function () {
$('.dataTables_length').addClass('bs-select');
$('#listarUsuarios').dataTable( {
    language: {
        "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
    }
} );
});