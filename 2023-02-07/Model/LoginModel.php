<?php
/*
 * Das LoginModel enthält eine Klasse, die die Db-Klasse aus der Datei Db.php im Model-Ordner erweitert.
 * Die Klasse LoginModel enthält eine einzige Methode, die auf der Grundlage einer E-Mail-Adresse nach einem Benutzer sucht und ein Array zurückgibt.
*/
  require_once(__dir__ . '/Db.php');
  class LoginModel extends Db {

    /**
      * @param string
      * @return array
      * @desc Returns a user record based on the method parameter....
    **/
    /*
     * Die fetchEmail-Methode nimmt $email als einzigen Parameter und gibt ein Array zurück, das vom Ergebnis der
     * vorherigen Operation abhängt. Die fetchEmail Funktion benutzt die Methoden der Db Klasse wie z.B.
     *      Die Abfrage-Methode.
     *      Die bind-Methode.
     *      Die execute-Methode.
     *      Die fetch-Methode.
    */
    public function fetchEmail(string $email) :array {
      $this->query("SELECT * FROM db_user WHERE email = :email");
      $this->bind('email', $email);
      $this->execute();

      $Email = $this->fetch();
      if(empty($Email)) {
        $Response = array(
            'status' => true,
            'data' => $Email
        );
        return $Response;
      }
      if(!empty($Email)) {
        $Response = array(
            'status' => false,
            'data' => $Email
        );
        return $Response;
      }
    }
  }
 ?>
