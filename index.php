<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="Css/index_estilos.css">
    <title>Bar Pola o Miedo</title>
    <link rel="shortcut icon" href="Img/logo.jpg" type="image/x-icon">

    <script>
        <?php
        session_start();
        if (isset($_SESSION["login_error"])) {
            $error_message = $_SESSION["login_error"];
            unset($_SESSION["login_error"]);
        }
        ?>

        function hideCustomAlert() {
            var customAlert = document.getElementById('customAlert');
            customAlert.style.display = 'none';
        }

        window.onload = function() {
            <?php
            if (isset($error_message)) {
                echo "showCustomAlert('" . $error_message . "');";
            }
            ?>

            function showCustomAlert(message) {
                var customAlert = document.getElementById('customAlert');
                var customAlertMessage = document.getElementById('customAlertMessage');
                customAlertMessage.innerHTML = message;
                customAlert.style.display = 'block';
            }
        }
    </script>
</head>
<body>
    <header>
        <h1>Iniciar Sesión</h1>
        <img src="Img/logo.jpg" alt="Logo representativo de la empresa .Everest">
    </header>

    <main>
        <form method="POST" action="BD/login.php">
            <label for="usuario">Correo eléctronico</label>
            <br>
            <input type="email" id="usuario" name="usuario" required><br>
            <label for="contrasena">Contraseña</label>
            <br>
            <input type="password" id="contrasena" name="contrasena" required><br>
            <label for="rol">Rol</label>
            <select id="rol" name="rol" required>
                <option value="Mesero">Mesero</option>
                <option value="Cajero">Cajero</option>
                <option value="Administrador">Administrador</option>
            </select><br>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </main>

    <div id="customAlert" class="custom-alert">
        <h2>¡Datos incorrectos!</h2>
        <p id="customAlertMessage"></p>
        <button onclick="hideCustomAlert()">Regresar</button>
    </div>
</body>
</html>
