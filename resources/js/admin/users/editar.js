jQuery(document).ready(() => {
    jQuery("#btn-actualizar-user").on("click", () => {
        if (jQuery("#name").val() == "" || jQuery("#email").val() == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes llenar el formulario.",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            jQuery("#form-actualizar-user").submit();
        }
    });

    jQuery("#btn-cancelar").on("click", () => {
        location.href = route("lista-users");
    });

    // ----------------------------------------

    let roleUser = jQuery("#role_user").val();
    $("#role option[value='" + roleUser +  "']").attr("selected", "selected");

    let countryIdUser = jQuery("#country_id_user").val();
    $("#country_id option[value='" + countryIdUser +  "']").attr("selected", "selected");
});
