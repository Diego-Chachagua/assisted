document.addEventListener("DOMContentLoaded", async function () {
    // Cargar los modelos de Face-API.js de forma asíncrona al entrar a la página
    console.log("Cargando modelos...");
    await faceapi.nets.ssdMobilenetv1.load("models");
    await faceapi.nets.faceLandmark68Net.load("models");
    await faceapi.nets.faceRecognitionNet.load("models");
    console.log("Modelos cargados exitosamente.");

    // Referencias a elementos del DOM
    const inputFoto = document.getElementById("foto");
    const botonGuardar = document.querySelector("form button[type=submit]");

    if (!botonGuardar) {
        console.error("El botón 'Guardar' no se encontró en el DOM.");
        return;
    }

    botonGuardar.addEventListener("click", async function (event) {
        event.preventDefault(); // Evitar que el formulario se envíe automáticamente

        // Verificar si se seleccionó una foto
        if (!inputFoto.files || inputFoto.files.length === 0) {
            alert("Por favor, seleccione una foto antes de guardar.");
            return;
        }

        // Obtener la imagen seleccionada por el usuario
        const imagenAlumno = inputFoto.files[0];
        const reader = new FileReader();

        reader.onload = async function () {
            // Crear una nueva imagen para trabajar con Face-API.js
            const image = new Image();
            image.src = reader.result;

            // Realizar la detección facial y extraer descriptores faciales
            const detections = await faceapi.detectAllFaces(image).withFaceLandmarks().withFaceDescriptors();
            const descriptors = detections.map((detection) => detection.descriptor);

            // Agregar los descriptores faciales al formulario como un campo oculto
            const descriptorsInput = document.createElement("input");
            descriptorsInput.type = "hidden";
            descriptorsInput.name = "descriptors";
            descriptorsInput.value = JSON.stringify(descriptors);
            document.querySelector("form").appendChild(descriptorsInput);

            // Enviar el formulario
            document.querySelector("form").submit();
        };

        if (imagenAlumno) {
            reader.readAsDataURL(imagenAlumno);
        }
    });
});
