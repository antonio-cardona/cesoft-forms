jQuery(document).ready(() => {
    jQuery("#tabla-preguntas").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-crear-pregunta").on("click", () => {
        if (jQuery("#texto").val() == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes llenar el formulario.",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            jQuery("#form-crear-pregunta").submit();
        }
    });

    jQuery("button.btn-eliminar-pregunta").on("click", (event) => {
        var idPregunta = jQuery(event.delegateTarget).data("pregunta-id");

        Swal.fire({
            title: `¿Confirma que desea eliminar la pregunta?`,
            icon: "question",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si",
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = route("delete-pregunta", [idPregunta]);
            }
        });
    });
});
