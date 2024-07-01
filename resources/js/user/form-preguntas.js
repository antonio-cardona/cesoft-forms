import axios from "axios";

jQuery(document).ready(() => {
    jQuery("#btn-save-form-preguntas-answers").on("click", () => {
        // Primero recolectamos la info de answers:
        let answers = [];
        let $preguntaAnswers = jQuery("textarea.pregunta-answer");
        let idForm = jQuery("#id-form").val();

        $preguntaAnswers.each((index, answer) => {
            answers.push({
                idPregunta: jQuery(answer).data("pregunta-id"),
                answer: jQuery(answer).val(),
            });
        });

        axios
            .post(route("create-form-preguntas"), {
                idForm: idForm,
                preguntasAnswers: answers
            })
            .then(function (response) {
                if (response.data.total > 0) {
                    location.href = route("form-classification-data", [idForm]);
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    });

    jQuery("#btn-go-back-areas").on("click", () => {
        let idForm = jQuery("#id-form").val();
        location.href = route("formulario-areas", [idForm]);
    });
});
