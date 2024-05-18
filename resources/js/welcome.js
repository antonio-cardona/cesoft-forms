import "./bootstrap";

document.addEventListener("DOMContentLoaded", function (e) {
    console.log("GeeksforGeeks page has loaded!");

    const selectPais = document.querySelector("#pais");
    selectPais.addEventListener("change", (event) => {
        axios
            .post("/provincias", {
                id_pais: event.target.value,
            })
            .then((response) => {
                let options = "";
                response.data.forEach((provincia) => {
                    options += `<option value="${provincia.id}">${provincia.nombre}</option>`;
                });

                const selectProvincia = document.querySelector("#provincia");
                selectProvincia.innerHTML = options;
            });
    });

    const formUsuarios = document.querySelector("#form-usuarios");
    formUsuarios.addEventListener("submit", (event) => {
        const plataformaSelecto = document.querySelector("#plataforma").event.target.value;
        const libroSelecto = document.querySelector("#libro").event.target.value;

        if (plataformaSelecto == "-" || libroSelecto == "-") {
            event.preventDefault();
        }
    });
});
