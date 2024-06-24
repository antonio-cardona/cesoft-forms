jQuery(document).ready(() => {
    jQuery("#tabla-ans").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-crear-area").on("click", () => {
        if (jQuery("#nombre").val() == "") {
            jQuery("#alert-error").show();
        } else {
            jQuery("#alert-error").hide();

            jQuery("#form-crear-area").submit();
        }
    });
});
