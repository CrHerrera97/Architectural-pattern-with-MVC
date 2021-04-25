$(document).ready(function () {
    $('#modalRemoveEstudiantes').on('show.bs.modal', function (atributos) {
        var miEstudiante = atributos.relatedTarget.title;
        var id = atributos.relatedTarget.id;
        $('#cod').val(id);
        $('#nombres').text(miEstudiante);
    });
});


