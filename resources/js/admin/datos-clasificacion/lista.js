jQuery(document).ready(() => {
    jQuery("#tabla-datos-clasificacion").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-crear-dato-clasificacion").on("click", () => {
        if (jQuery("#nombre").val() == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes llenar el formulario.",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            jQuery("#form-crear-dato-clasificacion").submit();
        }
    });
});
