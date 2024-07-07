jQuery(document).ready(() => {
    jQuery("#btn-crear-user").on("click", () => {
        if (jQuery("#name").val() == "" || jQuery("#email").val() == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes llenar el formulario.",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            jQuery("#form-crear-user").submit();
        }
    });

    jQuery("#btn-cancelar").on("click", () => {
        location.href = route("lista-users");
    });
});
