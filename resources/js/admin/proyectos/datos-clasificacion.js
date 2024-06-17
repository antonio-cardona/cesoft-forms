import { Droppable } from "@shopify/draggable";
import axios from "axios";

jQuery(document).ready(() => {
    const droppable = new Droppable(
        document.querySelectorAll(".drag-identificacion"),
        {
            draggable: ".item",
            dropzone: ".dropzone",
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
        axios
            .post("/admin/proyectos/datos-clasificacion/guardar", {
                idProyecto: jQuery("#id-proyecto").val(),
                identificacion: [
                    {
                        id: "DOC",
                        orden: 1
                    },
                    {
                        id: "CEL",
                        orden: 2
                    }
                ],
                clasificacion: [
                    {
                        id: 2,
                        orden: 1
                    },
                    {
                        id: 1,
                        orden: 2
                    }
                ],
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    });
});
