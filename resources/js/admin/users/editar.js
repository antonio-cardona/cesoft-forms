jQuery(document).ready(() => {
    jQuery("#btn-actualizar-user").on("click", () => {
        if (jQuery("#name").val() == "") {
            jQuery("#alert-error").show();
        } else {
            jQuery("#alert-error").hide();

            jQuery("#form-actualizar-user").submit();
        }
    });

    jQuery("#btn-cancelar").on("click", () => {
        location.href = "/admin/usuarios";
    });
});
