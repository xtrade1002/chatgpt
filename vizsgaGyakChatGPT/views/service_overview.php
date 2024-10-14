
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szerviz összesítő</title>
    <link rel="stylesheet" href="/vizsgaGyakChatGPT/assets/css/styles.css">
    <script src="/vizsgaGyakChatGPT/assets/js/script.js"></script>
</head>
<body>

<header>
    <h1>Szerviz összesítő</h1>
    <nav>
        <a href="/service_overview">Szerviz összesítő</a>
        <a href="/product_submission">Termék leadása</a>
    </nav>
</header>

<main style="max-width: 1200px; margin: 0 auto;">
    <table>
        <thead>
            <tr>
                <th>Szériaszám</th>
                <th>Gyártó</th>
                <th>Típus</th>
                <th>Leadás dátuma</th>
                <th>Státusz</th>
                <th>Utolsó státuszváltozás</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <?php
                    // Státusz színének beállítása
                    $statusColor = '';
                    switch ($product['status']) {
                        case 'Beérkezett': $statusColor = 'blue'; break;
                        case 'Hibafeltárás': $statusColor = 'red'; break;
                        case 'Alkatrész beszerzés alatt': $statusColor = 'orange'; break;
                        case 'Javítás': $statusColor = 'purple'; break;
                        case 'Kész': $statusColor = 'green'; break;
                    }
                ?>
                <tr style="background-color: <?= $statusColor ?>;">
                    <td><?= $product['serial_number'] ?></td>
                    <td><?= $product['manufacturer'] ?></td>
                    <td><?= $product['type'] ?></td>
                    <td><?= $product['submission_date'] ?></td>
                    <td>
                        <form action="/update_status.php" method="POST">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <select name="status" onchange="this.form.submit()">
                                <option <?= $product['status'] == 'Beérkezett' ? 'selected' : '' ?> value="Beérkezett">Beérkezett</option>
                                <option <?= $product['status'] == 'Hibafeltárás' ? 'selected' : '' ?> value="Hibafeltárás">Hibafeltárás</option>
                                <option <?= $product['status'] == 'Alkatrész beszerzés alatt' ? 'selected' : '' ?> value="Alkatrész beszerzés alatt">Alkatrész beszerzés alatt</option>
                                <option <?= $product['status'] == 'Javítás' ? 'selected' : '' ?> value="Javítás">Javítás</option>
                                <option <?= $product['status'] == 'Kész' ? 'selected' : '' ?> value="Kész">Kész</option>
                            </select>
                        </form>
                    </td>
                    <td><?= $product['last_status_change'] ?></td>
                    <td>
                        <button onclick="showContactInfo(<?= $product['id'] ?>)">Kapcsolattartó adatok</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="contact-info" style="display: none;">
        <!-- Kapcsolattartó adatai jelennek meg itt JavaScripttel -->
    </div>
</main>

<footer>
    <p>Ersching Bettina| Vizsga dátuma: <?= date('Y-m-d') ?></p>
</footer>

</body>
</html>
