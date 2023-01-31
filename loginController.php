<?php
    // Verificar si se envió el formulario
    if (!empty($_POST["btnlogin"])) {
        // Verificar si los campos están vacíos
        if (empty($_POST["correo"]) || empty($_POST["password"])) {
            echo '<div class="alert alert-danger">Almenos un campo esta vacio</div>';
        } else {
            // Recibir datos del formulario
            $correo = $_POST['correo'];
            $password = $_POST['password'];

            // Conectar a la base de datos
            $conn = mysqli_connect("localhost", "root", "", "actas_unicor");
            

            // Verificar credenciales
            $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                // Verificar contraseña cifrada con hash
                if (password_verify($password, $user['password_hash'])) {
                    // Inicio de sesión exitoso
                    header("Location: inicio.php");
                } else {
                    // Contraseña inválida
                    echo "<div class='alert alert-danger'>Correo o contraseña incorrectos.</div>";
                }
            } else {
                // Usuario no existe
                echo "<div class='alert alert-danger'>Correo o contraseña incorrectos.</div>";
            }
        }
    }
?>
