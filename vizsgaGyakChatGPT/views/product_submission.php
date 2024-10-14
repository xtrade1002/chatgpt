<?php
require_once('database.php');
require_once('product_submission.php');
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termék leadása</title>
    <link rel="stylesheet" href="/vizsgaGyakChatGPT/assets/css/styles.css">
</head>
<body>

<header>
    <h1>Termék leadása</h1>
    <nav>
        <a href="/service_overview">Szerviz összesítő</a>
        <a href="/product_submission">Termék leadása</a>
    </nav>
</header>

<main style="max-width: 1200px; margin: 0 auto;">
    <form action="/submit_product.php" method="POST">
        <div>
            <label for="serial_number">Szériaszám:</label>
            <input type="text" id="serial_number" name="serial_number" required>
        </div>

        <div>
            <label for="manufacturer">Gyártó:</label>
            <input type="text" id="manufacturer" name="manufacturer" required>
        </div>

        <div>
            <label for="type">Típus:</label>
            <input type="text" id="type" name="type" required>
        </div>

        <div>
            <label for="contact_name">Kapcsolattartó neve:</label>
            <input type="text" id="contact_name" name="contact_name" required>
        </div>

        <div>
            <label for="contact_phone">Kapcsolattartó telefonszáma:</label>
            <input type="text" id="contact_phone" name="contact_phone" required>
        </div>

        <div>
            <label for="contact_email">Kapcsolattartó email címe:</label>
            <input type="email" id="contact_email" name="contact_email" required>
        </div>

        <button type="submit">Termék rögzítése</button>
    </form>
</main>

<footer>
    <p>Ersching Bettina | Vizsga dátuma: <?= date('Y-m-d') ?></p>
</footer>

</body>
</html>
