<?php

include './partials/header.php'; 
require_once './users/users.php';





if ( (! isset($_GET['id'])) or (getUserById($_GET['id']) === null)) {
    include './partials/alert.php';
    exit;
};


$user = getUserById($_GET['id']);








?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View User: <?php echo $user['name'] ?></h3>
        </div>
        <div class="card-body">
           <a class="btn btn-secondary" href="update.php?id=<?php echo $user['id'] ?>">Update</a> 
           <form action="delete.php" method="post" style='display:inline-block'>
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <th>Name:</th>
                    <td><?php echo $user['name'] ?></td>
                </tr>
                <tr>
                    <th>Username:</th>
                    <td><?php echo $user['username'] ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $user['email'] ?></td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td><?php echo $user['phone'] ?></td>
                </tr>
                <tr>
                    <th>Website:</th>
                    <td>
                        <a target='_blank' href="http://<?php echo $user['website'] ?>">
                            <?php echo $user['website'] ?>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>


<?php include './partials/footer.php';  ?>