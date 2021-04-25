$(document).ready(function () {
    $('#modalRemoveFacultad').on('show.bs.modal', function (atributos) {
        var miFacultad = atributos.relatedTarget.title;
        var id = atributos.relatedTarget.id;
        $('#cod').val(id);
        $('#nombreFacultad').text(miFacultad);
    });
});