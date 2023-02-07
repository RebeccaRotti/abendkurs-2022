<?php
include_once('../inc/login.inc.php');

$id = $_GET['id'];
$statement = $pdo->prepare("DELETE FROM exercise01 WHERE id = ?");
$statement->execute(array($id)); //Löscht Benutzer mit ID 1
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
