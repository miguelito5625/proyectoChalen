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
                  <label for="idInputNombreDoc" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="idInputNombreDoc" placeholder="">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputNombreDoc" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="idInputNombreDoc" placeholder="">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputNombreDoc" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="idInputNombreDoc" placeholder="">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputNombreDoc" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="idInputNombreDoc" placeholder="">
                </div>
              </div>

            </div>


          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="card mt-2">
          <div class="card-header text-center">
            Datos Persona
          </div>
          <div class="card-body">

            <div class="row">

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputNombreDoc" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="idInputNombreDoc" placeholder="">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputNombreDoc" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="idInputNombreDoc" placeholder="">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputNombreDoc" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="idInputNombreDoc" placeholder="">
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="mb-3">
                  <label for="idInputNombreDoc" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="idInputNombreDoc" placeholder="">
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

            <div class="row">

              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Documento Escaneado</label>
                  <input class="form-control" type="file" id="formFile" onchange="fileSelected(this)">
                </div>
              </div>

              <embed src="http://example.com/the.pdf" id="idembed" width="500" height="375" type="application/pdf">


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