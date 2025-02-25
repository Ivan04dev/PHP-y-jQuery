$(document).ready(function () {
    $("#miFormulario").submit(function (event) {
        let isValid = true;
        
        // Recorre todos los campos de entrada dentro del formulario
        $("#miFormulario input, #miFormulario select, #miFormulario textarea").each(function () {
            if ($(this).val().trim() === "") {
                isValid = false;
                $(this).addClass("error"); // Agrega una clase para resaltar el error
            } else {
                $(this).removeClass("error");
            }
        });
        
        if (!isValid) {
            event.preventDefault(); // Evita el envío del formulario si hay errores
            alert("Por favor, completa todos los campos obligatorios.");
        }
    });

    // Elimina la clase de error cuando el usuario empieza a escribir
    $("#miFormulario input, #miFormulario select, #miFormulario textarea").on("input change", function () {
        if ($(this).val().trim() !== "") {
            $(this).removeClass("error");
        }
    });
});
