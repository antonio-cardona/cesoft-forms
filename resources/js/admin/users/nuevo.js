jQuery(document).ready(() => {
    jQuery("#btn-crear-user").on("click", () => {
        if (jQuery("#name").val() == "") {
            jQuery("#alert-error").show();
        } else {
            jQuery("#alert-error").hide();

            jQuery("#form-crear-proyecto").submit();
        }
    });

    jQuery("#btn-cancelar").on("click", () => {
        location.href = "/admin/usuarios";
    });
});
