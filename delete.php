<?php 

require './users/users.php';

// printr($_POST);

if (! isset($_POST['id'])) {
    include './partials/alert.php';
    exit;
}

$userId = $_POST['id'];

deleteUser($userId);

header('Location: index.php');

?>