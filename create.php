<?php 

require_once './users/users.php';

$user = [
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',

];

$errors = $user;
$isInvalid = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = array_merge($user, $_POST);

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
        $user =  createUser($_POST);
        uploadImage($_FILES['picture'],$user);
        $users = getUsers();
        array_push($users, $user);
        saveAsJson($users);
        header('Location: index.php');
    }
}

include './partials/header.php';
?>


<div class="container">
<?php include './_form.php'; ?> 
</div>

<?php include './partials/footer.php'; ?> 