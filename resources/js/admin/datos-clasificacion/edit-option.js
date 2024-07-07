jQuery(document).ready(() => {
    jQuery("#btn-actualizar-opcion-respuesta").on("click", () => {
        if (jQuery("#texto").val() == "" || jQuery("#orden").val() == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes llenar el formulario.",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            jQuery("#form-editar-opcion-respuesta").submit();
        }
    });
});
