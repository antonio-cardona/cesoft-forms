jQuery(document).ready(() => {
    jQuery("#tabla-participantes-proyecto").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    /*
    $("#modal-publicar-proyecto").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var nombreProyecto = button.data("proyecto-nombre");
        var urlPublicacion = button.data("url");
        var modal = $(this);
        modal.find("#modal-nombre-proyecto").text(nombreProyecto);
        modal.find("#btn-confirmar-publicacion").attr("href", urlPublicacion);
    });

    $("#modal-despublicar-proyecto").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var nombreProyecto = button.data("proyecto-nombre");
        var urlDesPublicacion = button.data("url");
        var modal = $(this);
        modal.find("#modal-nombre-proyecto").text(nombreProyecto);
        modal.find("#btn-confirmar-despublicacion").attr("href", urlDesPublicacion);
    });
    */
});
