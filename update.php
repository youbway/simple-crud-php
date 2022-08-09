<?php

require_once './users/users.php';





if ( (! isset($_GET['id'])) or (getUserById($_GET['id']) === null)) {
    include './partials/alert.php';
    exit;
};

$user = getUserById($_GET['id']);
$userId = $_GET['id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $user = array_merge($user, $_POST);
    $errors = [
        'name' => '',
        'username' => '',
        'email' => '',
        'phone' => '',
        'website' => '',
    ];
    $isInvalid = false;
    if (!$user['name']) {
        $errors['name'] = "name must not be empty";
        $isInvalid = true;
    }
    if (!$user['username'] or strlen($user['username'])< 6 or strlen($user['username'])>16) {
        $errors['username'] = "username is required and must be more than 6 and less than 16";
        $isInvalid = true;
    }
    if (!filter_var($user['email'],FILTER_VALIDATE_EMAIL) ) {
        $errors['email'] = "email must be a valid email address";
        $isInvalid = true;
    }
    if (!filter_var($user['phone'],FILTER_VALIDATE_INT) ) {
        $errors['phone'] = "phone must be a valid number";
        $isInvalid = true;
    }
    if (!filter_var($user['website'],FILTER_VALIDATE_URL) ) {
        $errors['website'] = "website must be a valid URL";
        $isInvalid = true;
    }


    if (!$isInvalid) {
        $user['id'] = $userId;
        uploadImage($_FILES['picture'], $user);
        updateUser($userId, $user);

        header('Location: index.php');
    }
}


include './partials/header.php'; 
?>


<?php include './_form.php' ?>


<?php include './partials/footer.php'; ?> 