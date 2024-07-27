jQuery(document).ready(() => {
    jQuery("#tabla-users").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-nuevo-user").on("click", () => {
        location.href = "/admin/usuarios/nuevo";
    });

    jQuery("button.btn-eliminar-user").on("click", (event) => {
        var idUser = jQuery(event.delegateTarget).data("user-id");
        var userLabel = jQuery(event.delegateTarget).data("user-name");

        Swal.fire({
            title: `¿Confirma que desea eliminar al usuario ${userLabel}?`,
            icon: "question",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si",
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = route("delete-user", [idUser]);
            }
        });
    });
});
