<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--<code>-->
<?php
    /* phpinfo();
        mehrzeiliger Kommentar
    */
    // var_dump($_SERVER);
    $example_1 = 3 * 2 + 5.4 * 4 - 1;
    echo $example_1 . '<br>';
    var_dump($example_1);
?>
<div>
    <p>Das ist die Ausgabe der Variable: <?= $example_1 ?></p>
    <p>Das ist die Ausgabe der Variable: <?php echo $example_1; ?></p>
</div>

<div>
    <p>Division durch 0</p>
    <?php //$example_2 = 2 / 0; echo $example_2; ?>
</div>

<div>
    <p>Kombinierte Zuweisungsoperatoren</p>
    <?php
        $zahl = 5;
        echo $zahl . '<br>';
        $zahl += 7;
        echo $zahl . "<br>";
    ?>
    <p>Zahl um eines erhöhen</p>
    <?php
        $a = 5;
        echo $a . '<br>';
        $a++;
        echo $a . '<br>';
        ++$a;
        echo $a . '<br>';
    ?>
</div>
<div>
    <p>Formatierung von Zahlen</p>
    <?php
    $zahl = 1458354.95735123;
    echo $zahl . '<br>';
    echo number_format($zahl) . '<br>'; // ganze Zahl
    echo number_format($zahl, 3) . '<br>';  // mit Dezimalstelle
    echo number_format($zahl, 3, ',', '.') . '<br>';

    // Rundung der Fließkommazahl auf angegeben Anzahl
    echo sprintf('%.3f', $zahl) . '<br>';
    // Rundung der Exponentialzahl
    echo sprintf("%.3e", $zahl) . '<br>';

    $zahl = 7;
    // Ausgabe ganze Zahl
    echo sprintf('%d', $zahl) . '<br>';
    // Ausgabe ganze Zahl mit mind. 2 Ziffern
    echo var_dump(sprintf("%'.03d", $zahl));
    ?>
</div>

<div>
    <p>Konstanten</p>
    <?php
        const pi = 3.1415926;
    ?>
</div>

<div>
    <p>Umwandlung</p>
    <?php
        $a = 42;
        echo var_dump(floatval($a)) . '<br>' . pi . '<br>';
        $b = strval($a);
        echo var_dump(strval($a)) . '<br>' . var_dump(mb_strlen($b)) . '<br>';
    ?>
</div>
<div>
    <p>Switch Case</p>
    <?php
    $wuerfel = 3;
    /* Einzelne Fälle */
    switch ($wuerfel) {
        case 1:
            $ausgabe = "Eins";
            break;
        case 2:
            $ausgabe = "Zwei";
            break;
        case 3:
            $ausgabe = "Drei";
            break;
        case 4:
            $ausgabe = "Vier";
            break;
        case 5:
        case 6:
                $ausgabe = "Die letzten zwei Ziffern";
                break;
        default:
            $ausgabe = "Kein Würfelwert da";
    }
    echo $ausgabe . '<br>';
    ?>
</div>
<!--</code>-->
</body>
</html>