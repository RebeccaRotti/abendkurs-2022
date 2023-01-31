<?php
include_once('../inc/login.inc.php');

$newEntry = array();
$newEntry['email'] = $_POST['inputMail'];
$newEntry['name'] = $_POST['inputName'];

$stmt = $pdo->prepare("INSERT INTO exercise01 (name, mail) VALUES (:name, :email)");
$stmt->execute($newEntry);

header('Location: ' . $_SERVER['HTTP_REFERER']);