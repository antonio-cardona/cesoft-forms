jQuery(document).ready(() => {
    jQuery("#tabla-proyectos").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-nuevo-proyecto").on("click", () => {
        location.href = route("nuevo-proyecto");
    });

    jQuery("button.btn-publicar-proyecto").on("click", (event) => {
        var nombreProyecto = jQuery(event.delegateTarget).data("proyecto-nombre");
        var targetLabel = jQuery(event.delegateTarget).data("target-label");
        var urlPublicacion = jQuery(event.delegateTarget).data("url");

        Swal.fire({
            title: `¿Confirma que desea ${targetLabel} el proyecto "${nombreProyecto}?"`,
            icon: "question",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si",
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = urlPublicacion;
            }
        });
    });
});
