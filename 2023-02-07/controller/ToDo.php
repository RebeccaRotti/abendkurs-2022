<?php
  require_once(__dir__ . '/Controller.php');
  require_once('./Model/ToDoModel.php');
  require_once ('./helper/helper.php');
  class ToDo extends Controller {

    public $active = 'toDo';
    private $toDoModel;


    public function __construct() {
      if(!isset($_SESSION['auth_status'])) header("Location: index.php");
      $this->toDoModel = new ToDoModel();
    }

    public function getToDo() :array {
      return $this->toDoModel->fetchToDo();
    }

    public function newEntry(array $data) {
      $headline = stripcslashes(strip_tags($data['headline']));
      $description = stripcslashes(strip_tags($data['description']));

      $Error = array(
          'headline' => '',
          'description' => ''
      );

      if(strlen($headline) < 1) {
        $Error['headline'] = 'need more characters';
        return $Error;
      }
      if(strlen($description) < 1) {
        $Error['description'] = 'need more characters';
        return $Error;
      }

      $saveIt = array(
          'description' => $description,
          'headline' => $headline
      );
      $Response = $this->toDoModel->createToDo($saveIt);
      todoHelper($Response);

    }

    public function singleEntry($id) {
      $Response = $this->toDoModel->singleEntry($id);
      return $Response;
    }

    public function updateEntry(array $data) {
      $Response = $this->toDoModel->updateSingleEntry($data);
      todoHelper($Response);
    }

    public function deleteEntry($id) {
      $Response = $this->toDoModel->deleteEntry($id);
      todoHelper($Response);
    }


  }
 ?>
