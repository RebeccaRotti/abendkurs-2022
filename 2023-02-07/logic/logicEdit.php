<?php
include_once('../inc/login.inc.php');

$updateMail = $_POST['inputMail'];
$updateName = $_POST['inputName'];
$id = $_POST['updateId'];


$statement = $pdo->prepare("UPDATE exercise01 SET mail = :email_new, name = :name_new WHERE id = :id");
$statement->execute(array('id' => $id, 'email_new' => $updateMail, 'name_new' => $updateName));

header('Location: ../index.php');
