$(document).ready(function () {
    $('#modalRemoveSede').on('show.bs.modal', function (atributos) {
        var miSede = atributos.relatedTarget.title;
        var id = atributos.relatedTarget.id;
        $('#cod').val(id);
        $('#nombreSede').text(miSede);
    });
});