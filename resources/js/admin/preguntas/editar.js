jQuery(document).ready(() => {
    jQuery("#btn-actualizar-pregunta").on("click", () => {
        if (jQuery("#texto").val() == "") {
            jQuery("#alert-error").show();
        } else {
            jQuery("#alert-error").hide();
            jQuery("#form-actualizar-pregunta").submit();
        }
    });

    jQuery("#btn-cancelar").on("click", () => {
        let idArea = jQuery("#id_area").val();
        location.href =`/admin/preguntas/${idArea}`;
    });
});
