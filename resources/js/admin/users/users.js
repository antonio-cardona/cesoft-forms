jQuery(document).ready(() => {
    jQuery("#tabla-users").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-nuevo-user").on("click", () => {
        location.href = "/admin/usuarios/nuevo";
    });
});
