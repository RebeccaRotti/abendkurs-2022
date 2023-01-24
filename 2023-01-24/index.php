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
<div>
    <p>Mehrfachverzweigung mit Match</p>
    <?php
    echo match($wuerfel) {
        1 => "Eins",
        2 => "Zwei",
        3 => "Drei",
        4, 5, 6 => "Der Rest",
        default => "Kein Würfelwert"
    };
    ?>
</div>
<div>
    <p>Ternärer Operator ?: </p>
    <?php
        $x = 8;
        $y = 12;

        $z = $x < $y ? $x : $y;
        echo $z . '<br>';

        $f = $x < $y ? '1' : ($x > $y ? "2" : "3");
        echo $f;
    ?>
</div>
<div>
    <p>Spaceship Operator <=></p>
    <?php
    echo "Wert eins: " . (12 <=> 5) . '<br>';
    echo "Zweiter Wert: " . (5 <=> 12). '<br>';
    echo "Gleiche Werte: " . (5 <=> 5);
    ?>
</div>
<div>
    <p>Existenz von Variablen</p>
    <?php
        if(isset($u)) echo $x . '<br>';
        else echo "nicht vorhanden<br>";
        $u = 42;
        if(isset($u)) echo $x . '<br>';
        else echo "nicht vorhanden<br>";
        unset($u);
        if(isset($u)) echo $x . '<br>';
        else echo "nicht vorhanden<br>";
    ?>
</div>

<div>
    <p>Koaleszenzoperator</p>
    <?php
    echo $temperatur ?? "Temperatur nicht vorhanden<br>";
    $temperatur = 36.5 . ' Celsius';
    echo $temperatur ?? "Temp nicht vorhanden";
    ?>
</div>

<div>
    <p>Arrays</p>
    <?php
        $tp = array(14.3, 19.3, 21.3, 4.3);
        $tp2 = array('Montag' => 14.3, 'Dienstag' => 19.3,
            'Mittwoch' => 21.3);

        //echo $tp[2] . '<br>';
        for ($i = 0; $i < count($tp); $i++) {
            echo $tp[$i] . '<br>';
        }
        foreach($tp2 as $key => $value) {
            echo $key . ' ' .$value . '<br>';
        }
        foreach($tp as $value) {
            echo $value . '<br>';
        }
    ?>
</div>
<div>
    <p>Funktionen</p>
    <?php
    function add($z1, $z2) {
        global $temperatur;
        echo $temperatur . '<br>';
        $summe = $z1 + $z2;
        return $summe;
    }
    $c = add(3, 4);
    echo "summe: " . $c;
    //  echo $z1; Nicht erreichbar außerhalb der Funktion

    $c = add($wuerfel, 4);
    echo $c . '<br>';
    ?>
</div>
<div>
    <p>Continue</p>
    <?php
        for ($i = 1; $i <= 15; $i++) {
            if($i >= 5 && $i <= 12) {
                continue;
            }
            echo "Zeile " . $i . '<br>';
        }
    ?>

</div>
<!--</code>-->
</body>
</html>