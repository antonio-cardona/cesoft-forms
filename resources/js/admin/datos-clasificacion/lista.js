jQuery(document).ready(() => {
    jQuery("#tabla-datos-clasificacion").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-crear-dato-clasificacion").on("click", () => {
        if (jQuery("#nombre").val() == "") {
            jQuery("#alert-error").show();
        } else {
            jQuery("#alert-error").hide();

            jQuery("#form-crear-dato-clasificacion").submit();
        }
    });
});
