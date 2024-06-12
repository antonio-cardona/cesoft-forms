jQuery(document).ready(() => {
    jQuery("#btn-actualizar-area").on("click", () => {
        if (jQuery("#nombre").val() == "") {
            jQuery("#alert-error").show();
        } else {
            jQuery("#alert-error").hide();
            jQuery("#form-actualizar-area").submit();
        }
    });

    jQuery("#btn-cancelar").on("click", () => {
        let idProyecto = jQuery("#id_proyecto").val();
        location.href =`/admin/areas/${idProyecto}`;
    });
});
