jQuery(document).ready(() => {
    jQuery("#btn-actualizar-area").on("click", () => {
        if (jQuery("#nombre").val() == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes llenar el formulario.",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            jQuery("#form-actualizar-area").submit();
        }
    });

    jQuery("#btn-cancelar").on("click", () => {
        let idProyecto = jQuery("#id_proyecto").val();
        location.href = route("listar-areas", [idProyecto]);
    });
});
