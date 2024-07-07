jQuery(document).ready(() => {
    jQuery("#table-options-classification-data").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-crear-opcion-respuesta").on("click", () => {
        if (jQuery("#texto").val() == "" || jQuery("#orden").val() == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes llenar el formulario.",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            jQuery("#form-crear-opcion-respuesta").submit();
        }
    });
});
