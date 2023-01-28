<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Übung</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
    <h2>Fehlerbehandlung</h2>
    <?php
    try{
        if(!isset($x)) {
            throw new Exception("Variable unbekannt<br>");
        }
        echo "Variable" . $x . '<br>';
    } catch (Exception $e) {
        echo "ohne Variable";
    } finally {
        echo "Ende, Variable unbekannt <br>";
    }

    ?>
</div>

<div>
    <h2>Funktion mit Übergabe und Rückgabeparameter</h2>
    <?php
    $text1 = 'Guten';
    $text2 = 'Morgen';
    function greetings($a, $b) {
        $string = $a . ' '. $b;
        return $string;
    }
    echo greetings($text1, $text2);
    ?>
</div>

<div>
    <h2>Rekursive Funktionen</h2>
    <?php
    $x = 1.5;
    /* Rekursion */
    function halbieren(&$z) {
        $z = $z / 2;
        if($z > 0.1) {
            echo "z: $z<br>";
            halbieren($z);
        }
    }
    echo "x: $x<br>";
    halbieren($x);
    echo "x: $x<br>";
    ?>
</div>

<div>
    <h2>Formularauswertung</h2>
    <form action="formularauswertung.php" method="POST"> <!-- enctype="multipart/form-data" => für Dateiupload -->
        <section class="flex">
            <label for="username">Ihr Name</label>
            <input type="text" id="username" name="username" required>
        </section>
        <section class="flex">
            <label for="usermessage">Ihre Nachricht an uns</label>
            <textarea id="usermessage" name="usermessage" required></textarea>
        </section>
        <section class="flex">
            <label>Ihre Wünsche</label>
            <div>
                <div class="checkboxen">
                    <input type="checkbox" name="special01">
                    Tresor
                </div>
                <div class="checkboxen">
                    <input type="checkbox" name="special02">
                    Whirlpool
                </div>
            </div>
        </section>
        <section class="flex">
            <label>Wunschland</label>
            <div>
                <div class="radio">
                    <input type="radio" name="destination" value="Asien" checked>Asien
                </div>
                <div class="radio">
                    <input type="radio" name="destination" value="Europe">Europa
                </div>
                <div class="radio">
                    <input type="radio" name="destination" value="America">Amerika
                </div>
            </div>
        </section>
        <section class="flex">
            <button type="submit" class="btn btn-send">Absenden</button>
            <button type="reset" class="btn btn-cancel">Reset</button>
        </section>
    </form>
</div>
</body>
</html>