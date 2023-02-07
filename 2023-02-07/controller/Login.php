<?php
/*
 * Diese Datei enthält eine Klasse namens Login Controller, die den Basis-Controller erweitert. Die Datei lädt auch
 * einige Abhängigkeiten, indem sie das LoginModel für das Abrufen eines Benutzers auf der
 * Grundlage der Benutzer-E-Mail-Adresse benötigt.
 * */
require_once(__dir__ . '/Controller.php');
require_once('./Model/LoginModel.php');

class Login extends Controller {

  public $active = 'login'; //for highlighting the active link...
  private $loginModel;

  /**
    * @param null|void
    * @return null|void
    * @desc Checks if the user session is set and creates a new instance of the LoginModel...
  **/

  /*
   * Die magische Methode __construct
   * Diese Methode wird ausgeführt, sobald eine Instanz der Login-Klasse erstellt wird. Diese Methode erzeugt eine neue
   * Instanz der Klasse LoginModel, die an die private Dateneigenschaft $loginModel übergeben wird.
   */
  public function __construct() {
      if(isset($_SESSION['auth_status'])) header("Location: dashboard.php");
      $this->loginModel = new LoginModel();
  }

  /**
    * @param array
    * @return array|boolean
    * @desc Verifies and redirects a user by calling the login method on the LoginModel...
  **/
  /*
   * Die Login-Methode
   * Diese Methode behandelt die gesamte Geschäftslogik für die Authentifizierung eines Benutzers. Die Methode empfängt
   * ein Array und gibt ein Array zurück, wenn die Authentifizierung des Benutzers fehlschlägt, andernfalls wird ein Http Redirect zurückgegeben.
  */
  public function login(array $data) {
      $email = stripcslashes(strip_tags($data['email']));
      $password = stripcslashes(strip_tags($data['password']));

      $EmailRecords = $this->loginModel->fetchEmail($email);

      if(!$EmailRecords['status']) {
          //___
          if(password_verify($password, $EmailRecords['data']['password'])) {
            $Response = array(
                'status' => true
            );

            $_SESSION['data'] = $EmailRecords['data'];
            $_SESSION['auth_status'] = true;
            header("Location: dashboard.php");
          }
          //___

          $Response = array(
              'status' => false
          );
          return $Response;
      }

      $Response = array(
          'status' => false
      );
      return $Response;
  }
}
 ?>
