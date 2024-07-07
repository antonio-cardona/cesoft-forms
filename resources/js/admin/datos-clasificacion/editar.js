jQuery(document).ready(() => {
    jQuery("#btn-actualizar-dato-clasificacion").on("click", () => {
        if (jQuery("#nombre").val() == "" || jQuery("#orden").val() == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes llenar el formulario.",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            jQuery("#form-actualizar-dato-clasificacion").submit();
        }
    });
});
