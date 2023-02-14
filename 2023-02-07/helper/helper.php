<?php

function helper($Response) {
    if (!$Response['status']) {
        $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
        return $Response;
    }
    header("Location: todo.php");
}
