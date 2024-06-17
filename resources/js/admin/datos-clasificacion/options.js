jQuery(document).ready(() => {
    jQuery("#table-options-classification-data").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-crear-opcion-respuesta").on("click", () => {
        if (jQuery("#nombre").val() == "") {
            jQuery("#alert-error").show();
        } else {
            jQuery("#alert-error").hide();

            jQuery("#form-crear-opcion-respuesta").submit();
        }
    });
});
