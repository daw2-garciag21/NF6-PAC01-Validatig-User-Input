<?php
$correo = $_POST['email'];

if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo "Email address '$correo' is considered valid.\n";
} else {
    echo "Email address '$correo' is considered invalid.\n";
}
?>