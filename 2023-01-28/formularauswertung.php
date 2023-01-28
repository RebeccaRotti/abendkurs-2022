<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Übung</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    var_dump($_POST);
?>
<h1 class="center">Ihre Anfrage</h1>
<article>
    <section class="flex">
        <p>Ihr Name</p>
        <p><?= $_POST['username'] ?></p>
    </section>
    <section class="flex">
        <p>Ihre Nachricht</p>
        <p><?= $_POST['usermessage'] ?></p>
    </section>
    <section class="flex">
        <p>Ihre Wunschdestination</p>
        <p><?= $_POST['destination'] ?></p>
    </section>
    <section class="flex">
        <p>Extrawurst</p>
        <p>
            <?php
                echo ($_POST['special01'] ?? '') ? 'inkl. Tresor <br>' : 'kein Tresor<br>';
                echo ($_POST['special02'] ?? '') ? 'inkl. Whirlpool <br>' : 'kein Whirlpool';

                // Alternative
                /*if(isset($_POST['special01'])) {
                    echo 'inkl. Tresor <br>';
                }
                if(isset($_POST['special02'])) {
                    echo 'inkl. Whirlpool';
                }*/
            ?>
        </p>
    </section>
    <?php
        $angebot = 0;

        switch ($_POST['destination']) {
            case 'Asien':
                $angebot += 1800;
                break;
            case 'Europe':
                $angebot += 600;
                break;
            case 'America':
                $angebot += 3000;
                break;
        }
    ?>
    <section class="flex">
        <p>Unser Angebot</p>
        <div>
            <p>Reise € <?= $angebot ?></p>
            <?php
                $zusatz = 0;
            if(isset($_POST['special01'])) {
                $zusatz += 50;
            }
            if(isset($_POST['special02'])) {
                $zusatz += 50;
            }
            ?>
            <p>Zusatz € <?= $zusatz ?></p>
            <p><strong>Insg.: € <?= $zusatz + $angebot ?></strong></p>
        </div>
    </section>
</article>
</body>
</html>













