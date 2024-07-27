jQuery(document).ready(() => {
    jQuery("#tabla-ans").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-crear-area").on("click", () => {
        if (jQuery("#nombre").val() == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes llenar el formulario.",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            jQuery("#form-crear-area").submit();
        }
    });

    jQuery("button.btn-eliminar-area").on("click", (event) => {
        var idArea = jQuery(event.delegateTarget).data("area-id");

        Swal.fire({
            title: `¿Confirma que desea eliminar el área y sus preguntas correspondientes?`,
            icon: "question",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si",
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = route("delete-area", [idArea]);
            }
        });
    });
});
