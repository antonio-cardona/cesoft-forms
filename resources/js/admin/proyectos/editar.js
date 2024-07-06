jQuery(document).ready(() => {
    jQuery('#fecha_final').datetimepicker({
        uiLibrary: 'bootstrap4',
        locale: 'es-es',
        format: 'yyyy-mm-dd HH:MM'
    });

    jQuery("#btn-actualizar-proyecto").on("click", () => {
        if (jQuery("#nombre").val() == "") {
            jQuery("#alert-error").show();
        } else {
            jQuery("#alert-error").hide();

            jQuery("#form-actualizar-proyecto").submit();
        }
    });

    jQuery("#btn-cancelar").on("click", () => {
        location.href = route("lista-proyectos");
    });
});
