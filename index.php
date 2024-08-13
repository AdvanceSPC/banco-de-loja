<?php
if (isset($_GET['service']) && isset($_GET['cedula'])) {
    $service = $_GET['service'];
    $cedula = $_GET['cedula'];

    header("Location: index.php?nombre=$service&cedula=$cedula");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesor en Vivo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body onload="Camara()">
    <div class="container">
        <div class="important-info col-md-6 col-lg-6 col-12 text-center">
            <h2>IMPORTANTE</h2>
            <p class="header">La información contenida en este espacio es de uso confidencial y exclusivo para el titular de la cuenta.</p>
            <ul>
                
                <li>La llamada será grabada para su seguridad.</li>
                <li>Poseer la cédula de identidad a la mano.</li>
                <li>Conceder permisos a la cámara y micrófono.</li>
            </ul>
            <p><strong>Seleccione su requerimiento</strong>, si está de acuerdo con los términos y condiciones <strong>acepte</strong> y presione <strong>Continuar</strong>. La llamada se abrirá en una nueva ventana.</p>
        </div>
        <div>
            <form id="mainForm" method="GET" action="index.php">
                <div class="checkbox-container">
                    <input type="checkbox" id="termsCheck" name="terms">
                    <label for="">Acepto los <a style="text-decoration: underline;" onclick="window.open('http://localhost:3000/terms.html','winname','directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,scrollbars=no,resizable=no,width=800,height=500')">términos y condiciones</a> de uso.</label>
                </div>
                <div id="comboSection" style="display: none;">
                    <select id="serviceSelect" name="service">
                        <option value="">Seleccione su requerimiento</option>
                        <option value="Actualización de Banco">Actualización de Banco</option>
                        <option value="Banca Electrónica">Banca Electrónica</option>
                        <option value="Banca Movil">Banca Movil</option>
                        <option value="Créditos">Créditos</option>
                        <option value="Cuentas">Cuentas</option>
                        <option value="Giros">Giros</option>
                        <option value="Pólizas">Pólizas</option>
                        <option value="Reclamo">Reclamo</option>
                        <option value="Tarjeta de Débito">Tarjeta de Débito</option>
                        <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                        <option value="Transferencia">Transferencia</option>
                    </select>
                </div>

                <div id="inputSection" style="display: none;">
                    <label for="codeInput">Por favor, ingresa el código dactilar que se encuentra en tu cédula:</label>
                    <input type="text" id="codeInput" name="codigo" pattern="[A-Za-z]\d{4}[A-Za-z]\d{4}" title="Por favor, ingrese el código en el formato correcto: una letra, cuatro números, una letra, cuatro números" required>
                </div>

                <button id="continueButton" type="submit" disabled>Continuar</button>
            </form>
        </div>
    </div>
    <div class="img">
        <img src="../CIERRE.jpg" alt="">
    </div>
    <script src="script.js"></script>
</body>
</html>
