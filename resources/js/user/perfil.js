import axios from "axios";

jQuery(document).ready(() => {
    jQuery("#btn-save-user-data").on("click", () => {
        // Primero recolectamos la info del user:
        let name = jQuery("#name").val();
        let email = jQuery("#email").val();
        let idCountry = jQuery("#country_id").val();
        let idUser = jQuery("#user_id").val();

        if (name == "" || email == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes llenar el formulario. El nombre y email son obligatorios.",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            axios
                .post(route("ajax-update-user"), {
                    idUser: idUser,
                    name: name,
                    email: email,
                    idCountry: idCountry
                })
                .then((response) => {
                    Swal.fire({
                        title: "Guardado!",
                        text: "Se han guardado con éxito los datos personales.",
                        icon: "success",
                        confirmButtonText: "Aceptar",
                    });
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });


    jQuery("#btn-save-password").on("click", () => {
        // Primero recolectamos la info del user:
        let new_password = jQuery("#new_password").val();
        let repeat_new_password = jQuery("#repeat_new_password").val();
        let idUser = jQuery("#user_id").val();
        let errorMessage = "";

        if (new_password == "" || repeat_new_password == "") {
            errorMessage = "Debes llenar los dos campos de clave.";
        } else if (new_password != repeat_new_password) {
            errorMessage = "Las dos claves no coinciden.";
        } else if (new_password.length < 8) {
            errorMessage = "La clave debe tener mínimo 8 caracteres.";
        }

        if (errorMessage.length > 0) {
            Swal.fire({
                title: "Error!",
                text: errorMessage,
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        } else {
            axios
                .post(route("ajax-update-password"), {
                    idUser: idUser,
                    new_password: new_password
                })
                .then((response) => {
                    Swal.fire({
                        title: "Guardado!",
                        text: "Se ha guardado con éxito la nueva clave.",
                        icon: "success",
                        confirmButtonText: "Aceptar",
                    });

                    jQuery("#new_password").val("");
                    jQuery("#repeat_new_password").val("");
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });
});
