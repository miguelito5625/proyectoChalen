<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guardar</title>

  <link rel="stylesheet" href="css/formguardardoc.css">

  <script src="/proyectoChalen/paginas/js/checkAuth.js"></script>


  <?php
  include 'headers/headerbootstrap.php';
  include 'headers/headerfirebase.php';
  include 'headers/headernav.php';
  ?>

  <script src="js/pdfjs/webviewer.min.js"></script>


</head>

<body>

  <div class="container mt-2">

    <div class="row">

      <div class="col-12">
        <div class="card">
          <div class="card-header text-center">
            Datos Documento
          </div>
          <div class="card-body">

            <div class="row">

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputTipoDoc" class="form-label">Tipo de documento</label>
                  <select class="form-select" id="idInputTipoDoc" aria-label="Default select example">
                    <!-- <option selected></option> -->
                    <option value="Documento tipo 1">Documento tipo 1</option>
                    <option value="Documento tipo 2">Documento tipo 2</option>
                  </select>
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputNombreVendedor" class="form-label">Nombre vendedor</label>
                  <input type="text" class="form-control" id="idInputNombreVendedor" placeholder="">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputNombreComprador" class="form-label">Nombre comprador</label>
                  <input type="text" class="form-control" id="idInputNombreComprador" placeholder="">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputDpiVendedor" class="form-label">No. DPI vendedor</label>
                  <input type="text" class="form-control" id="idInputDpiVendedor" placeholder="">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputDpiComprador" class="form-label">No. DPI comprador</label>
                  <input type="text" class="form-control" id="idInputDpiComprador" placeholder="">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputFecha" class="form-label">Fecha</label>
                  <input type="date" class="form-control" id="idInputFecha" placeholder="">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputNumEscritura" class="form-label">No. De Escritura</label>
                  <input type="text" class="form-control" id="idInputNumEscritura" placeholder="">
                </div>
              </div>

            </div>


          </div>
        </div>
      </div>



      <div class="col-12">
        <div class="card mt-2 mb-3">
          <div class="card-header text-center">
            Documento
          </div>
          <div class="card-body">

            <div class="row d-flex justify-content-center">

              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="mb-3">
                  <label for="idInputFile" class="form-label">Documento Escaneado</label>
                  <!-- <input class="form-control" type="file" id="idInputFile" onchange="fileSelected(this)" accept="application/pdf"> -->
                  <input class="form-control" type="file" id="idInputFile" accept="application/pdf">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">

                <!-- <embed src="" id="idembed" width="100%" height="500" type="application/pdf"> -->

                <div id='viewer' style="width:100%; height: 500px; margin:0 auto"></div>



              </div>

            </div>


          </div>
        </div>


      </div>

    </div>

  </div>

  <a href="#" class="float" onclick="guardarDocumento()">
    <i class="fa fa-save fa-lg my-float"></i>
  </a>


  <script>
    // Your web app's Firebase configuration
    const firebaseConfig = {
      apiKey: "AIzaSyCXwPn2E2rUXh1oT2AeJpVTAV7pMw1NNcY",
      authDomain: "wifinet-df089.firebaseapp.com",
      databaseURL: "https://wifinet-df089.firebaseio.com",
      projectId: "wifinet-df089",
      storageBucket: "wifinet-df089.appspot.com",
      messagingSenderId: "964535514142",
      appId: "1:964535514142:web:5a3c567bcfe000cfadaa0f"
    };

    // Initialize Firebase
    const app = firebase.initializeApp(firebaseConfig);
    // Initialize Cloud Storage and get a reference to the service
    const storage = app.storage();

    const inputArchivo = document.getElementById("idInputFile");
    WebViewer({
    path: 'js/pdfjs', // path to the PDF.js Express'lib' folder on your server
    licenseKey: 'xaRA048B0xv8p9GDh6ua',
    // initialDoc: 'https://pdftron.s3.amazonaws.com/downloads/pl/webviewer-demo.pdf',
    // initialDoc: '/path/to/my/file.pdf',  // You can also use documents on your server
  }, document.getElementById('viewer'))
  .then(instance => {
    // now you can access APIs through the WebViewer instance
    const { Core, UI } = instance;

    inputArchivo.addEventListener('change', () => {
        // Get the file from the input
        const file = inputArchivo.files[0];
        instance.UI.loadDocument(file, { filename: file.name });
      });

    // adding an event listener for when a document is loaded
    Core.documentViewer.addEventListener('documentLoaded', () => {
      console.log('document loaded');
    });

    // adding an event listener for when the page number has changed
    Core.documentViewer.addEventListener('pageNumberUpdated', (pageNumber) => {
      console.log(`Page number is: ${pageNumber}`);
    });
  });


    function fileSelected(event) {
      console.log(event.files[0].name);
      const url = window.URL.createObjectURL(event.files[0]);
      document.getElementById('idembed').src = url;
    }


    function guardarDocumento() {

      Swal.fire({
        title: 'Guardando...',
        timerProgressBar: true,
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading()
        },
      });

      var documento = {
        tipoDocumento: document.getElementById('idInputTipoDoc').value,
        nombreVendedor: document.getElementById('idInputNombreVendedor').value,
        nombreComprador: document.getElementById('idInputNombreComprador').value,
        dpiVendedor: document.getElementById('idInputDpiVendedor').value,
        dpiComprador: document.getElementById('idInputDpiComprador').value,
        fecha: document.getElementById('idInputFecha').value,
        numEscritura: document.getElementById('idInputNumEscritura').value,
        urlArchivo: ""
      }

      // const inputArchivo = document.getElementById("idInputFile");
      const archivo = inputArchivo.files[0];

      const nombreArchivo = archivo.name.split('.')[0] + '-' + Number(new Date().getTime() / 1000).toFixed(0).toString() + '.' + archivo.name.split('.')[1];


      const storageRef = storage.ref('escaneos/' + nombreArchivo);
      const task = storageRef.put(archivo);
      task.on('state_changed', function progress(snapshot) {
        var percentage = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
        // uploader.value = percentage;
        console.log(percentage);

      }, function error(err) {

        Swal.fire({
          icon: 'error',
          title: 'Error al subir el archivo',
          showConfirmButton: false,
          showCloseButton: true,
        });

      }, function complete(data) {
        console.log("ARCHIVO SUBIDO");
        storageRef.getDownloadURL().then((url) => {
          documento.urlArchivo = url;
          console.log(documento);

          $.ajax({
            type: "POST",
            url: 'funcionesphp/guardardocumento.php',
            data: documento,
            success: function(response) {
              console.log(response);

              if (response.estado === "ok") {

                setTimeout(() => {
                  Swal.fire({
                  icon: 'success',
                  title: 'Documento guardado',
                  showConfirmButton: false
                });
                }, 1200);

                setTimeout(() => {
                  window.location.href = "/proyectoChalen/paginas/tabladocumentos.php";
                }, 3000);

              }


            },
            error: function(xhr, status) {
              console.log('HUBO UN ERROR');
              console.log(xhr, status);
              Swal.fire({
                icon: 'error',
                title: 'Error en el servidor',
                showConfirmButton: false,
                showCloseButton: true,
              });
            }
          });


        });
      });

    }
  </script>

</body>

</html>