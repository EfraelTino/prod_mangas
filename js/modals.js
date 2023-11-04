function verCap(id) {
    const contenedor_modal = document.getElementById("contenedor_modal");

    if (contenedor_modal.classList.contains("ver_modal")) {
        // Si el modal está abierto, ciérralo
        contenedor_modal.classList.remove("ver_modal");

    } else {
        // Si el modal está cerrado, ábrelo y establece el contenido según el ID
        // Aquí puedes cargar contenido dinámico basado en el ID, si es necesario}
        contenedor_modal.querySelector(".modal-body").textContent = "Contenido del modal para ID: " + id;

        contenedor_modal.classList.add("ver_modal");
    }
}
