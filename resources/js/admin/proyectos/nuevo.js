jQuery(document).ready(() => {
    jQuery('#fecha_final').datetimepicker({
        uiLibrary: 'bootstrap4',
        locale: 'es-es',
        format: 'yyyy-mm-dd HH:MM'
    });

    jQuery("#btn-crear-proyecto").on("click", () => {
        if (jQuery("#nombre").val() == "" || jQuery("#descripcion").val() == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes llenar el formulario. El nombre y la descripción son obligatorios.",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            jQuery("#form-crear-proyecto").submit();
        }
    });

    jQuery("#btn-cancelar").on("click", () => {
        location.href = route("lista-proyectos");
    });
});
