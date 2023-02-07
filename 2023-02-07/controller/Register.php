<?php
/*
 * Diese Datei enthält eine Klasse namens Register Controller, die den Basis-Controller erweitert.
 * Sie benötigt auch das RegisterModel als Abhängigkeit, das instanziiert wird, wenn eine neue Instanz der Register-Klasse erstellt wird.
 * */

  require_once(__dir__ . '/Controller.php');
  require_once('./Model/RegisterModel.php');
  class Register extends Controller {

    public $active = 'Register'; //for highlighting the active link...
    private $registerModel;

    /**
      * @param null|void
      * @return null|void
      * @desc Checks if the user session is set and creates a new instance of the RegisterModel...
    **/
    /*
     * Die Methode __construct
     * Diese Methode erstellt eine neue Instanz der Klasse RegisterModel und übergibt das Objekt an die geschützte Eigenschaft $registerModel der Klasse Register.
     */

    public function __construct() {

    }

    /**
      * @param array
      * @return array|boolean
      * @desc Verifies, Creates, and returns a user by calling the register method on the RegisterModel...
    **/
    /*
     * Die Register-Methode
     * Diese Methode behandelt die gesamte Geschäftslogik für die Erstellung eines neuen Benutzers. Die Methode empfängt ein
     * Array und gibt ein Array zurück, wenn die Überprüfung des Benutzers fehlschlägt, andernfalls wird ein Http Redirect zurückgegeben und eine neue Sitzung für den Benutzer erstellt.
     * */
    public function register(array $data) {

    }
  }
 ?>
