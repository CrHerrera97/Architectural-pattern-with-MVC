$(document).ready(function () {
    $('#modalRemovePrograma').on('show.bs.modal', function (atributos) {
        var miPrograma = atributos.relatedTarget.title;
        var id = atributos.relatedTarget.id;
        $('#cod').val(id);
        $('#nombrePrograma').text(miPrograma);
    });
});

