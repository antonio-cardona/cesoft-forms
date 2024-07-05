import { Droppable, Plugins } from "@shopify/draggable";
import axios from "axios";

jQuery(document).ready(() => {
    const droppable = new Droppable(
        document.querySelectorAll(".drag-area"),
        {
            draggable: ".item",
            dropzone: ".dropzone",
            mirror: {
                constrainDimensions: true,
            },
            plugins: [Plugins.ResizeMirror],
        }
    );

    // --- Draggable events --- //
    let droppableOrigin;

    droppable.on("drag:start", (evt) => {
        droppableOrigin = evt.originalSource.parentNode.dataset.dropzone;
    });

    droppable.on("droppable:dropped", (evt) => {
        if (droppableOrigin !== evt.dropzone.dataset.dropzone) {
            evt.cancel();
        }
    });

    jQuery("#btn-save-form-areas").on("click", () => {
        // Primero recolectamos la info de areas:
        let areas = [];
        let $areaCards = jQuery("#area-selected-list div.area-card");
        let ancestorNode;
        let idForm = jQuery("#id-form").val();

        $areaCards.each((index, element) => {
            ancestorNode = jQuery(element).parents("div.dropzone").eq(0);
            areas.push({
                id: jQuery(element).data("area-id"),
                orden: ancestorNode.data("order"),
            });
        });

        axios
            .post(route('create-form-areas'), {
                idForm: idForm,
                areas: areas
            })
            .then(function (response) {
                if (response.data.total > 0) {
                    location.href = route("form-preguntas", [idForm]);
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    });
});
