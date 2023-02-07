<?php
  require_once(__dir__ . '/Controller.php');
  /*
   * Diese Datei enthält eine Klasse namens Logout Controller, die den Basis-Controller erweitert.
   * Die Methode __construct zerstört die Sitzung der Anwendung und führt eine HTTP-Umleitung zur Anmeldeseite durch.
   * */
  class Logout extends Controller {

    /**
      * @param null|void
      * @return null|void
      * @desc Destroys the application session and redirects to the login page...
    **/
    public function __construct() {

    }
  }
 ?>
