jQuery(document).ready(() => {
    jQuery("#btn-actualizar-pregunta").on("click", () => {
        if (jQuery("#texto").val() == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes llenar el formulario.",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            jQuery("#form-actualizar-pregunta").submit();
        }
    });

    jQuery("#btn-cancelar").on("click", () => {
        let idArea = jQuery("#id_area").val();
        location.href = route("lista-preguntas", [idArea]);
    });
});
