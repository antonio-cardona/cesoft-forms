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
});
