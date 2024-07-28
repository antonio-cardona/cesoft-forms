import { Droppable, Plugins } from "@shopify/draggable";
import axios from "axios";

jQuery(document).ready(() => {
    const droppable = new Droppable(
        document.querySelectorAll(".drag-identificacion"),
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

    jQuery("#btn-save-proyecto-classification-data").on("click", () => {
        // Primero recolectamos la info de identificacion:
        let identification = [];
        let classification = [];

        let $idCards = jQuery("#identification-selected-list div.identification-card");
        let ancestorNode;

        $idCards.each((index, element) => {
            ancestorNode = jQuery(element).parents("div.dropzone").eq(0);
            identification.push({
                id: jQuery(element).data("identification-data-id"),
                orden: ancestorNode.data("order"),
            });
        });

        let $clsCards = jQuery("#classification-selected-list div.classification-card, #classification-selected-list-2 div.classification-card");
        $clsCards.each((index, element) => {
            ancestorNode = jQuery(element).parents("div.dropzone").eq(0);
            classification.push({
                id: jQuery(element).data("classification-data-id"),
                orden: ancestorNode.data("order"),
            });
        });

        let idProyecto = jQuery("#id-proyecto").val();
        axios
            .post(route("guardar-datos-clasificacion-proyecto"), {
                idProyecto: idProyecto,
                identification: identification,
                classification: classification
            })
            .then(function (response) {
                location.href = route("datos-clasificacion-proyecto", [idProyecto]);
            })
            .catch(function (error) {
                console.log(error);
            });
    });
});
