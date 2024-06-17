jQuery(document).ready(() => {
    jQuery("#btn-actualizar-opcion-respuesta").on("click", () => {
        if (jQuery("#texto").val() == "") {
            jQuery("#alert-error").show();
        } else {
            jQuery("#alert-error").hide();
            jQuery("#form-editar-opcion-respuesta").submit();
        }
    });
});
