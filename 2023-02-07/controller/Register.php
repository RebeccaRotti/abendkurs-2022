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
        if(isset($_SESSION['auth_status'])) header("Location: dashboard.php");
        $this->registerModel = new RegisterModel();
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
        $name = stripcslashes(strip_tags($data['name']));
        $email = stripcslashes(strip_tags($data['email']));
        $phone = stripcslashes(strip_tags($data['phone']));
        $password = stripcslashes(strip_tags($data['password']));

        $EmailStatus = $this->registerModel->fetchUser($email)['status'];

        $Error = array(
          'name' => '',
          'email' => '',
          'phone' =>  '',
          'password' =>'',
          'status' => false
        );

        if(preg_match('/[^A-Za-z\s]/', $name)) {
          $Error['name'] = 'Only Alphabets are allowed';
          return $Error;
        }
        if(!empty($EmailStatus)) {
          $Error['email'] = 'Sorry. This Email Address has been taken.';
          return $Error;
        }
        if(preg_match('/[^0-9_]/', $phone)) {
          $Error['phone'] = 'Please, use a valid phone number';
          return $Error;
        }
        if(strlen($password) < 7) {
          $Error['password'] = 'Please, use a stronger password.';
          return $Error;
        }

        $Payload = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        );

        $Response = $this->registerModel->createUser($Payload);

        $Data = $this->registerModel->fetchUser($email)['data'];
        unset($Data['password']);

        if(!$Response['status']) {
          $Response['status'] = 'Sorry, An unexpected error occurred. Please contact SysAdmin. Haha';
          return $Response;
        }

        $_SESSION['data'] = $Data;
        $_SESSION['auth_status'] = true;
        header("Location: dashboard.php");
        return true;



    }
  }
 ?>
