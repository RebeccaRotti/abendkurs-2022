 <?php
 /*
  * Die RegisterModel-Datei erweitert die Db-Klasse, die am Anfang der Datei erforderlich ist. Die Klasse RegisterModel
  * hat zwei Methoden createUser und fetchUser, die für die Erstellung eines neuen Benutzers und die Rückgabe eines
  * neuen Benutzers verantwortlich sind.
  */
  require_once(__dir__ . '/Db.php');
  class RegisterModel extends Db {

    /**
      * @param array
      * @return array
      * @desc Creates and returns a user record....
    **/
    /*
     * Die createUser-Methode akzeptiert ein Array als einzigen Parameter und gibt ein Array zurück, das vom Ergebnis der
     * Datenbankoperation abhängt. Die createUser-Methode verwendet die bereitgestellten Methoden in der Db-Klasse.
     * */
    public function createUser(array $user) :array
    {

    }

    /**
      * @param string
      * @return array
      * @desc Returns a user record based on the method parameter....
    **/
    /*
     * Die fetchUser-Methode akzeptiert einen E-Mail-String als einzigen Parameter und gibt ein Array zurück, das
     * einen Benutzer mit der E-Mail enthält, die vom Ergebnis der Datenbankoperation abhängt. Die Methode gibt eine
     * Benutzerressource mit der E-Mail-Adresse zurück.
     * */
    public function fetchUser(string $email) :array
    {

    }
  }
 ?>
