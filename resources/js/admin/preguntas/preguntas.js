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
});
