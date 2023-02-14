<?php
  require_once(__dir__ . '/Controller.php');
  require_once('./Model/ToDoModel.php');
  require_once ('./helper/helper.php');
  class ToDo extends Controller {

    public $active = 'toDo';
    private $toDoModel;


    public function __construct() {

    }

    public function getToDo() :array {

    }

    public function newEntry(array $data) {

    }

    public function singleEntry($id) {

    }

    public function updateEntry(array $data) {

    }

    public function deleteEntry($id) {

    }


  }
 ?>
