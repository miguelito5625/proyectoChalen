<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Principal</title>

  <link rel="stylesheet" href="css/formguardardoc.css">

  <script src="/proyectoChalen/paginas/js/checkAuth.js"></script>


  <?php
  include 'headers/headerbootstrap.php';
  include 'headers/headernav.php';
  ?>


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
                    <option value="1">Documento tipo 1</option>
                    <option value="1">Documento tipo 2</option>
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
                  <label for="formFile" class="form-label">Documento Escaneado</label>
                  <input class="form-control" type="file" id="formFile" onchange="fileSelected(this)" accept="application/pdf">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">

                <embed src="" id="idembed" width="100%" height="500" type="application/pdf">


              </div>

            </div>


          </div>
        </div>


      </div>

    </div>

  </div>

  <a href="#" class="float">
    <i class="fa fa-save fa-lg my-float"></i>
  </a>


  <script>
    function fileSelected(event) {
      console.log(event.files[0].name);
      const url = window.URL.createObjectURL(event.files[0]);
      document.getElementById('idembed').src = url;
    }
  </script>

</body>

</html>