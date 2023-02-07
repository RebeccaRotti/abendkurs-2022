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
    public function createUser(array $user) :array {
      $this->query('INSERT INTO db_user (name, email, phone_no, password) VALUES (:name, :email, :phone_no, :password)');
      $this->bind('name', $user['name']);
      $this->bind('email', $user['email']);
      $this->bind('phone_no', $user['phone']);
      $this->bind('password', $user['password']);
      if($this->execute()) {
        $Response = array(
            'status' => true
        );
        return $Response;
      } else {
        $Response = array(
            'status' => false
        );
        return $Response;
      }
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
    public function fetchUser(string $email) :array {
        $this->query("SELECT * FROM db_User WHERE email = :email");
        $this->bind('email', $email);
        $this->execute();

        $User = $this->fetch();
        if(!empty($User)) {
          $Response = array(
              'status' => true,
              'data' => $User
          );
          return $Response;
        }
        return array(
            'status' => false,
            'data' => []
        );
    }
  }
 ?>
