jQuery(document).ready(() => {
    jQuery("#tabla-preguntas").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-crear-pregunta").on("click", () => {
        if (jQuery("#texto").val() == "") {
            jQuery("#alert-error").show();
        } else {
            jQuery("#alert-error").hide();

            jQuery("#form-crear-pregunta").submit();
        }
    });
});
