import axios from "axios";

jQuery(document).ready(() => {
    jQuery("#btn-save-form-classification-data-answers").on("click", () => {
        // Primero recolectamos la info de answers:
        let answers = [];
        let $cDataAnswers = jQuery("div.cdata-container");
        let idForm = jQuery("#id-form").val();

        $cDataAnswers.each((index, cDataAnswer) => {
            let optName = jQuery(cDataAnswer).data("option-group-name");
            let selectedOption = jQuery(`input[name='${optName}']:checked`);
            let selectedIdOption = 0;
            if (selectedOption.length > 0) {
                selectedIdOption = selectedOption.val();
            }

            if (selectedIdOption > 0) {
                answers.push({
                    idProyectoClassificationData: jQuery(cDataAnswer).data("proyecto-classification-data-id"),
                    selectedIdOption: selectedIdOption,
                });
            }
        });

        axios
            .post(route("create-form-classification-data"), {
                idForm: idForm,
                classificationDataAnswers: answers
            })
            .then(function (response) {
                if (response.data.total > 0) {
                    location.href = route("mis-formularios");
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    });

    jQuery("#btn-go-back-preguntas").on("click", () => {
        let idForm = jQuery("#id-form").val();
        location.href = route("formulario-preguntas", [idForm]);
    });
});
