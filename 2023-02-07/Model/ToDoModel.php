 <?php

  require_once(__dir__ . '/Db.php');
  class ToDoModel extends Db {


    public function fetchToDo() :array {
      $this->query("SELECT * FROM todo WHERE user_id = :user_id");
      $this->bind('user_id', $_SESSION['data']['id']);
      $this->execute();

      $ToDo = $this->fetchAll();
      if(count($ToDo) > 0) {
        $Response = array(
          'status' => true,
          'data' => $ToDo
        );

        return $Response;
      }

      $Response = array(
        'status' => false,
        'data' => []
      );
      return $Response;
    }

    public function createToDo(array $todo) :array {
      $id = $_SESSION['data']['id'];

      $this->query("INSERT INTO todo (headline, description, user_id) VALUES (:headline, :description, :user_id)");
      $this->bind('headline', $todo['headline']);
      $this->bind('description', $todo['description']);
      $this->bind('user_id', $id);
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

    public function singleEntry($id){
      $this->query("SELECT * FROM todo WHERE id = :id");
      $this->bind('id', $id);
      $this->execute();
      $todo = $this->fetchAll();

      $Response = array(
          'status' => true,
          'data' => $todo
      );
      return $Response;
    }

    public function updateSingleEntry(array $data) {
      $this->query("UPDATE todo SET headline = :headline, description = :description WHERE id = :id");
      $this->bind('headline', $data['headline']);
      $this->bind('description', $data['description']);
      $this->bind('id', $data['entry']);
      $this->execute();
      $Response = array(
          'status' => true
      );
      return $Response;
    }

    public function deleteEntry($id) {
        $this->query('DELETE FROM todo WHERE id = :id');
        $this->bind('id', $id);
        $this->execute();

        $Response = array(
            'status' => true
        );
        return $Response;
    }

  }
 ?>
