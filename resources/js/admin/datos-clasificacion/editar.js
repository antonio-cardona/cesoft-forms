jQuery(document).ready(() => {
    jQuery("#btn-actualizar-dato-clasificacion").on("click", () => {
        if (jQuery("#nombre").val() == "") {
            jQuery("#alert-error").show();
        } else {
            jQuery("#alert-error").hide();
            jQuery("#form-actualizar-dato-clasificacion").submit();
        }
    });
});
