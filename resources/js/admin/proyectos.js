//import DataTable from 'datatables.net-dt';
//import 'datatables.net-responsive-dt';

jQuery(document).ready(() => {
    jQuery("#tabla-proyectos").DataTable();

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery("#btn-nuevo-proyecto").on("click", () => {
        location.href = "/admin/proyectos/nuevo";
    });
});
