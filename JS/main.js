const video = document.getElementById('video');
let descriptoresJS = []; // Variable para almacenar los descriptores faciales en tiempo real

function starVideo() {
  navigator.getUserMedia =
    navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia;
  navigator.getUserMedia(
    { video: {} },
    (stream) => {
      video.srcObject = stream;
      detectFaces(); // Llama a la función detectFaces después de iniciar la cámara
    },
    (err) => console.log(err)
  );
}

Promise.all([
  faceapi.nets.tinyFaceDetector.loadFromUri('../models'),
  faceapi.nets.faceLandmark68Net.loadFromUri('../models'),
  faceapi.nets.faceRecognitionNet.loadFromUri('../models')
]).then(starVideo);

async function detectFaces() {
  video.addEventListener('play', async () => {
    const canvas = faceapi.createCanvasFromMedia(video);
    document.body.append(canvas);
    const displaySize = { width: video.width, height: video.height };
    faceapi.matchDimensions(canvas, displaySize);

    setInterval(async () => {
      const detections = await faceapi
        .detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
        .withFaceLandmarks()
        .withFaceDescriptors();

      const resizedDetections = faceapi.resizeResults(detections, displaySize);
      canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);

      faceapi.draw.drawDetections(canvas, resizedDetections);
      faceapi.draw.drawFaceLandmarks(canvas, resizedDetections);

      if (detections.length > 0) {
        for (var i = 0; i < detections.length; i++) {
            const descriptorJS = detections[i].descriptor;
            const umbralDeSimilitud = 0.4;
    
            for (var j = 0; j < descriptoresFaciales.length; j++) {
                const numero = j;
                const descriptorAR = JSON.parse(descriptoresFaciales[j]);
                const descriptoreslim = Object.values(descriptorAR[0]);
    
                if (descriptoreslim.length === descriptorJS.length) {
                    const distance = faceapi.euclideanDistance(descriptorJS, descriptoreslim);
    
                    if (distance < umbralDeSimilitud) {
                        $.ajax({
                            type: 'POST',
                            url: '/php/camara.php',
                            data: {
                                j: numero // Enviar la variable j al servidor
                            },
                            success: function(response) {
                                // Maneja la respuesta del servidor aquí
                                // console.log(response);
    
                                // Actualiza una parte de la página con la respuesta del servidor
                                $('#resultado').html(response);
                            },
                            error: function(error) {
                                // Maneja errores aquí si es necesario
                                console.error(error);
                            }
                        });
                    }
                }
            }
        }
    }
    
    }, 1000);
  });
}

