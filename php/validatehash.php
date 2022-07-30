<?php

$pass = $_POST['pass'];


$hash = '$2y$10$qFRdjdsmH5W6nciFF.oOvO4owPEWTy1mca.Cr8VIG5bkKGzW9dp3K';

if (password_verify($pass, $hash)) {
    echo 'La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}