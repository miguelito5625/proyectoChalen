<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php
    include 'headers/headerbootstrap.php';
    include 'headers/headerfirebase.php';
    ?>

    <link rel="stylesheet" href="css/login.css">

</head>

<body>

    <div class="wrapper">
        <div class="logo">
            <img src="https://w7.pngwing.com/pngs/770/246/png-transparent-judge-lawyer-gavel-training-course-hand-logo-law-firm.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Iniciar Sesion
        </div>
        <form class="p-3 mt-3" onsubmit="event.preventDefault(); iniciarSesion();">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="inputUsuario" id="inputUsuario" placeholder="Usuario" value="mike">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="inputContrasenia" id="inputContrasenia" placeholder="Contraseña" value="contrasenia">
            </div>
            <button class="btn mt-3">Acceder</button>
        </form>

    </div>

    <script>
        //Eliminar usuario autenticado localmente
        localStorage.removeItem('userAuth');


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

        function iniciarSesion() {
            const usuario = document.getElementById("inputUsuario").value;
            const contrasenia = document.getElementById("inputContrasenia").value;
            console.log(usuario, contrasenia);

            Swal.fire({
                title: 'Iniciando sesion',
                timerProgressBar: true,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                },
            });

            const userFireStore = app.firestore().collection('usuarios').doc(usuario);
            userFireStore.get().then((doc) => {
                if (doc.exists) {
                    console.log('exists');
                    console.log(doc.data());

                    $.ajax({
                        type: "POST",
                        url: '/proyectoChalen/php/validatehash.php',
                        data: {
                            pass: contrasenia,
                            hash: doc.data().contrasenia
                        },
                        success: function(response) {
                            console.log(response);
                            if (response === 'valid') {
                                console.log('sesion iniciada');
                                localStorage.setItem('userAuth', JSON.stringify(doc.data()));
                                setTimeout(() => {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Sesión iniciada',
                                        showConfirmButton: false
                                    });

                                    setTimeout(() => {
                                        window.location.href = "/proyectoChalen/paginas/principal.php";
                                    }, 2000);

                                }, 1200);

                            } else {
                                console.log('error al iniciar sesion');
                                setTimeout(() => {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Revise sus credenciales',
                                        showConfirmButton: false,
                                        showCloseButton: true,
                                    });
                                }, 1200);
                            }
                        },
                        error: function(xhr, status) {
                            setTimeout(() => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'No se pudo iniciar sesión',
                                    showConfirmButton: false
                                });
                            }, 1200);
                        }
                    });


                } else {
                    console.log('not exists');
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Revise sus credenciales',
                            showConfirmButton: false,
                            showCloseButton: true,
                        });
                    }, 1200);
                }
            }).catch((error) => {
                console.log("Error getting document:", error);
            });

        }
    </script>

</body>

</html>