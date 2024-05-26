jQuery(document).ready(() => {
    jQuery("#tabla-proyectos").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-nuevo-proyecto").on("click", () => {
        location.href = "/admin/proyectos/nuevo";
    });

});
