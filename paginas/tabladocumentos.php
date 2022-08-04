<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla documentos</title>

   <?php
   include 'headers/headerbootstrap.php';
   include 'headers/headernav.php';
   ?>




</head>

<body>

    <div class="container mt-2">

        <table id="idTabladocumentos" class="table table-striped" width="100%"></table>

    </div>


    <script>

        var tabla;
        var filaTabla;


        $(document).ready(function () {
            tabla = $('#idTabladocumentos').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url': 'funcionesphp/listarDocumentos.php'
                },
                'columns': [
                    {
                        title: '#',
                        "defaultContent": ""
                    },
                    {
                        title: 'Tipo Documento',
                        data: 'tipo_documento'
                    },
                    {
                        title: 'Vendedor',
                        data: 'nombre_vendedor'
                    },
                    {
                        title: 'Comprador',
                        data: 'nombre_comprador'
                    },
                    {
                        title: 'Dpi Vendedor',
                        data: 'dpi_vendedor'
                    },
                    {
                        title: 'Dpi Comprador',
                        data: 'dpi_comprador'
                    },
                    {
                        title: 'No. Escritura',
                        data: 'numero_escritura'
                    },
                    
                    {
                        title: "Acciones",
                        data: 'url_archivo',
                        "render": function (data, type, full) {
                            return '<div class="btn-group">' +
                                '<button type="button" id="' + data + '" onclick=" abrirArchivoEnOtraPestania (this.id) " class="btn btn-outline-secondary" > <i class="fa-solid fa-eye" data-toggle="tooltip" data-placement="top" title="Ver documento"></i> </button>' +
                                '<button type="button" id="' + full + '" onclick=" enviarRegistroAModificar () " class="btn btn-outline-secondary" > <i class="fa-solid fa-pen-to-square" data-toggle="tooltip" data-placement="top" title="Modificar"></i> </button>' +
                                '</div>'
                        },
                    }
                ],
                language: {
                    url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
                // columnDefs: [
                //     {
                //         target: 0,
                //         visible: false,
                //         searchable: false,
                //     }
                // ],

                order: [[1, 'asc']],
            });

            tabla.on('draw', function () {
                $('[data-toggle="tooltip"]').tooltip();
            });

            tabla.on('order.dt search.dt draw', function () {
                let i = 1;

                tabla.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                    this.data(i++);
                });

            }).draw();

            tabla.on('click', 'button', function () {
                var data = tabla.row($(this).parents('tr')).data();
                filaTabla = data;
            });

        });

        function abrirArchivoEnOtraPestania(e) {
            console.log(e);
            var url = e;
            window.open(url, '_blank').focus();
        }

        function enviarRegistroAModificar() {
            setTimeout(() => {
                console.log(filaTabla);
                // window.open(url, '_blank').focus();s
            }, 150);
        }


// setTimeout(() => {
//     console.log(dataSet);
//     dataSet = [];
//     dataSet.push(['Unity Butler', 'Marketing Designer', 'San Francisco', '5384', '2009/12/09', '$85,675']);
//     console.log(dataSet );
//     tabla.clear().rows.add(dataSet).draw();

// }, 3000);

// Swal.fire({
//   title: 'Auto close alert!',
//   timerProgressBar: true,
// //   allowOutsideClick: false,
//   didOpen: () => {
//     Swal.showLoading()
//   },
// });

    </script>

</body>

</html>