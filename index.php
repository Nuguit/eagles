<?php
session_start();
include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST["nombre"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $mensaje = $conn->real_escape_string($_POST["mensaje"]);

    $sql = "INSERT INTO formulario (Nombre, Mail, Mensaje) VALUES ('$nombre', '$email', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensaje_confirmacion'] = "¡Fly Eagles fly!";
        $_SESSION['clase_mensaje'] = "mensaje";
    } else {
        $_SESSION['mensaje_confirmacion'] = "Ups: " . $conn->error;
        $_SESSION['clase_mensaje'] = "mensaje";
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Eagles - Contacto</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="includes/logoea.png" type="image/png">
</head>

<body>
    <header>
        <img id="logoheader" src="includes/logoea.png" alt="logo" />
        <nav>
            <a href="#portada">Home</a>
            <a href="#historia">Historia</a>
            <a href="#team">Jugadores</a>
        </nav>
    </header>

    <img id="portada" src="includes/portada.jpeg" alt="portada" />

    <div id="team">
        <?php
        $sql = "SELECT * FROM jugadores";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="jugador">';
                echo '<img src="' . $row["Ruta_imagen"] . '" alt="' . $row["Nombre"] . '" />';
                echo '<p>' . $row["Nombre"] . '</p>';
                echo '<p>' . $row["Posicion"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "Ningún águila por aquí...";
        }
        ?>
    </div>

    <h1>El equipo que ha hecho historia</h1>
    <h3>¿Quieres contarnos algo? Envía tu apoyo a los Eagles desde cualquier parte del mundo</h3>

    <div class="doscol">
        <form method="POST" action="">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required />

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required />

            <div class="mensaje-boton">
                <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..." required></textarea>
                <button type="submit">Go Birds!</button>
            </div>
        </form>

        <?php
        if (isset($_SESSION['mensaje_confirmacion'])) {
            echo '<p class="' . $_SESSION['clase_mensaje'] . '">' . $_SESSION['mensaje_confirmacion'] . '</p>';
            unset($_SESSION['mensaje_confirmacion']);
            unset($_SESSION['clase_mensaje']);
        }
        ?>

        <img src="includes/logoform.jpg" alt="logoeagles" />
    </div>

    
    <div id="historia">
        <img src="includes/historia.png" alt="eaglesvintage">
        <div id="historiatext">
            <p>En el corazón de Filadelfia, donde el espíritu de lucha se entrelaza con la historia de una nación,
                nacieron los Eagles en 1933, herederos de un equipo desaparecido pero portadores de una nueva esperanza.
                Sus primeras décadas fueron una batalla constante hasta que, bajo la dirección de leyendas como Greasy
                Neale, conquistaron la gloria con títulos en 1948 y 1949, forjando su identidad de guerreros
                incansables. Durante años de altibajos, con héroes como Chuck Bednarik y Reggie White, el equipo se
                convirtió en símbolo de una ciudad que nunca se rinde, aguardando su momento bajo las luces más
                brillantes del fútbol americano.</p>
            <p>Ese momento llegó en 2018 cuando, contra todo pronóstico, los Eagles volaron más alto que nunca en la
                Super Bowl LII. Con Nick Foles como el inesperado líder y un equipo que encarnó la resistencia y el
                ingenio, vencieron a los todopoderosos Patriots en un duelo épico, regalando a Filadelfia su primer
                anillo de campeonato en la era moderna. Hoy los Eagles continúan escribiendo su historia con la misma
                pasión, representando a una afición feroz que, con cada aullido desde las gradas del Lincoln Financial
                Field, demuestra que el fútbol en Filadelfia no es solo un deporte, sino una forma de vida.</p>
        </div>
    </div>
    <div class="doscol">
  <div class="col-texto">
    <h3>No te olvides de colaborar con Eagles Autism Foundation</h3>
    <a href="https://www.eaglesautismchallenge.org/">
      <h2>¡Haz clic aquí para hacer tu reserva de camiseta!</h2>
    </a>
  </div>
  <img src="includes/autism.png" alt="eaglesautismo" />
</div>







</body>

</html>