<?php
/*
 * Im Model-Ordner enthält die Datei Db.php alle notwendigen Konfigurationen, um eine Verbindung mit unserer Mysql-Datenbank herzustellen.
 * Die Datei "Db.php" dient auch als Basisklasse für alle anderen Klassen im Ordner "Model".
 * Unsere Klasse enthält einige geschützte Eigenschaften, die wir bei der Erstellung unseres DSN (Data Source Name) verwenden werden, der für die Erstellung einer neuen PDO-Verbindung erforderlich ist.
 * > Ein Datenquellenname (DSN) ist eine Datenstruktur, die die Informationen über eine bestimmte Datenbank enthält, die ein Open Database Connectivity (ODBC)-Treiber benötigt, um eine Verbindung zu ihr herzustellen.
 * */
  class Db {
    protected $dbName = 'uebung'; /** Database Name */
    protected $dbHost = 'localhost:3306'; /** Database Host */
    protected $dbUser = 'root'; /** Database Root */
    protected $dbPass = ''; /** Databse Password */
    protected $dbHandler, $dbStmt;

    /**
      * @param null|void
      * @return null|void
      * @desc Creates or resume an existing database connection...
    **/
    public function __construct()
    {

    }

    /*
     *  Nach dieser Erklärung wurde eine neue Datenbankverbindung erstellt und an die geschützte Eigenschaft $dbHandler der Klasse Db übergeben,
     * die es ermöglicht, die erstellte Datenbankverbindung in den Methoden der aktuellen Klasse und anderen Klassen, die die Klasse Db erweitern, zu referenzieren.
     * Wir hätten einfach faul sein und die Datenbankverbindung verwenden können, die von der PDO-Instanz erstellt wurde, ohne sie weiter zu
     * erweitern, aber das würde die Anwendung wahrscheinlich schwer zu warten machen, weil wir eine Menge PDO-Methoden in verschiedenen Dateien
     * referenzieren würden, was nicht wirklich DRY (Don't Repeat Yourself) ist.
     * Um dieses Problem zu lösen, ist ein objektorientierter Ansatz hier am besten geeignet, da wir alle PDO-Methoden an einem Ort haben,
     * was ein angemessenes Maß an Abstraktion bietet, da wir nur Methoden aufrufen müssen, die in der Datenbankklasse verfügbar sind, um eine bestimmte Aufgabe zu erfüllen.
     * > Abstraktion ist die Auswahl von Daten aus einem größeren Pool, um dem Benutzer nur die relevanten Details des Objekts zu zeigen.
     * Abstraktion "zeigt" nur die wesentlichen Attribute und "versteckt" unnötige Informationen. Sie hilft, die Komplexität und den Aufwand
     * der Programmierung zu reduzieren. Sie ist eines der wichtigsten Konzepte der OOPs.
     * */
    /**
      * @param string
      * @return null|void
      * @desc Creates a PDO statement object
    **/
    public function query($query)
    {
    }

    /*
     * Die Abfragemethode, die ein einziges Argument akzeptiert und null oder ungültig zurückgibt, ist für die Wiederverwendung
     * der Datenbankverbindung verantwortlich, die erstellt und an die geschützte Variable $dbHandler übergeben wurde.
     * Diese wird für den Aufruf der Prepare-Methode verwendet, die die Zeichenkette aus der Query-Methode akzeptiert. Es wird
     * ein Anweisungsobjekt erstellt und an eine weitere geschützte Eigenschaft $dbStmt weitergegeben.
     * */

    /**
      * @param string|integer|
      * @return null|void
      * @desc Matches the correct datatype to the PDO Statement Object.
    **/
    /*
     * Die bind-Methode akzeptiert 3 Parameter, $param, $value und $type. Die Methode führt dann eine switch-Anweisung aus, wenn $type Null ist, um den richtigen Datentyp an $type zu binden.
     * Verfügbare PDO-Datentypen:
     *    PDO::PARAM_BOOL: Stellt einen booleschen Datentyp dar.
     *    PDO::PARAM_NULL: Stellt den SQL-NULL-Datentyp dar.
     *    PDO::PARAM_INT: Stellt den SQL INTEGER-Datentyp dar.
     *    PDO::PARAM_STR: Stellt den SQL-Datentyp CHAR, VARCHAR oder einen anderen String-Datentyp dar.
     * Die bind-Methode versucht auch, die richtigen Werte an die ? oder : Platzhalter zu binden, die in der Abfragemethode aus dem Anweisungsobjekt generiert werden.
    */
    public function bind($param, $value, $type = null)
    {

    }



    /**
      * @param null|void
      * @return null|void
      * @desc Executes a PDO Statement Object or a db query...
    **/
    /*
     * Die Execute-Methode erhält keine Parameter und gibt ein boolean true oder ein boolean false zurück. Diese Methode versucht,
     * die Ausführungsmethode von PDO aufzurufen, die die vorbereitete Anweisung oder das generierte Anweisungsobjekt ausführt.
     * */
    public function execute()
    {

    }

    /**
      * @param null|void
      * @return null|void
      * @desc Executes a PDO Statement Object an returns a single database record as an associative array...
    **/
    /*
     * Die Fetch-Methode ruft die Execute-Methode der Db-Klasse auf, die die generierte vorbereitete PDO-Anweisung ausführt,
     * und die Fetch-Methode, die auch eine andere PDO-Methode namens fetch aufruft, die einen einzelnen Parameter
     * annimmt und bestimmt, wie das Ergebnis verarbeitet und in dem als Argument übergebenen Format zurückgegeben wird.
     * */
    public function fetch()
    {

    }

    /**
      * @param null|void
      * @return null|void
      * @desc Executes a PDO Statement Object an returns nultiple database record as an associative array...
    **/

    /*
     * Die Methode fetchAll ruft ebenfalls die bereits erläuterte Methode execute der Klasse Db auf.
     * Der einzige Unterschied besteht darin, dass die fetchAll-Methode eine PDO-Methode namens fetch_all für die
     * vorbereitete Anweisung aufruft, die ein einziges Argument annimmt und eine Liste zurückgibt, die alle
     * übereinstimmenden Datensätze in der Datenbank in Abhängigkeit von der Bedingung der vorbereiteten Anweisung enthält.
     * */
    public function fetchAll()
    {

    }
  }
 ?>
