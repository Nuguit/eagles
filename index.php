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
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Eagles - Philadelphia Football</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="includes/logoea.png" type="image/png">
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo-section">
                <img id="logoheader" src="includes/logoea.png" alt="Eagles Logo" />
                <span class="brand-text">EAGLES</span>
            </div>
            <nav>
                <a href="#portada" class="nav-link">Home</a>
                <a href="#team" class="nav-link">Jugadores</a>
                <a href="#historia" class="nav-link">Historia</a>
                <a href="#contacto" class="nav-link">Contacto</a>
            </nav>
        </div>
    </header>

    <section id="portada" class="hero">
        <img src="includes/portada.jpeg" alt="Eagles Portada" class="hero-image" />
        <div class="hero-overlay"></div>
    </section>

    <section id="team" class="team-section">
        <div class="section-header">
            <h2>Nuestros Jugadores</h2>
            <p class="subtitle">Conoce a los héroes que vuelan por Filadelfia</p>
        </div>
        <div class="team-grid">
            <?php
            $sql = "SELECT * FROM jugadores";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="jugador-card">';
                    echo '<div class="jugador-image-container">';
                    echo '<img src="' . $row["Ruta_imagen"] . '" alt="' . $row["Nombre"] . '" class="jugador-image" />';
                    echo '</div>';
                    echo '<div class="jugador-info">';
                    echo '<h3>' . $row["Nombre"] . '</h3>';
                    echo '<p class="posicion">' . $row["Posicion"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="no-jugadores">Ningún águila por aquí...</p>';
            }
            ?>
        </div>
    </section>

    <h1 class="history-title">El equipo que ha hecho historia</h1>

    <section id="historia" class="historia-section">
        <div class="historia-content">
            <div class="historia-image">
                <img src="includes/historia.png" alt="Eagles Vintage">
            </div>
            <div id="historiatext" class="historia-text">
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
    </section>

    <section id="contacto" class="contacto-section">
        <div class="section-header">
            <h2>¡Sé parte de los Eagles!</h2>
            <p class="subtitle">¿Quieres contarnos algo? Envía tu apoyo desde cualquier parte del mundo</p>
        </div>
        <div class="contacto-content">
            <div class="form-container">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required />
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required />
                    </div>

                    <div class="form-group full-width">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..." required></textarea>
                    </div>

                    <button type="submit" class="btn-submit">Go Birds! 🦅</button>
                </form>

                <?php
                if (isset($_SESSION['mensaje_confirmacion'])) {
                    echo '<div class="' . $_SESSION['clase_mensaje'] . '">' . $_SESSION['mensaje_confirmacion'] . '</div>';
                    unset($_SESSION['mensaje_confirmacion']);
                    unset($_SESSION['clase_mensaje']);
                }
                ?>
            </div>

            <div class="form-image">
                <img src="includes/logoform.jpg" alt="Eagles Logo" />
            </div>
        </div>
    </section>

    <section class="autism-section">
        <div class="autism-content">
            <div class="autism-text">
                <h2>Colabora con Eagles Autism Foundation</h2>
                <p>Ayuda a los Eagles a marcar la diferencia en la comunidad</p>
                <a href="https://www.eaglesautismchallenge.org/" class="btn-autism">Reserva tu Camiseta</a>
            </div>
            <div class="autism-image">
                <img src="includes/autism.png" alt="Eagles Autism Foundation" />
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Philadelphia Eagles. All rights reserved. 🦅</p>
    </footer>







</body>

</html>