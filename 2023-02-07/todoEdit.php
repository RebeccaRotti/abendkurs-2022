<?php
require_once('./controller/ToDo.php');

$ToDo = new ToDo();
$Response = [];
$Response = $ToDo->singleEntry($_GET['id']);
echo json_encode($Response);

