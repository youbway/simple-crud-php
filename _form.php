<div class="container">
    <div class="card">
        <div class="card-header">
            <h3> <?php if ($user['name']) : ?>
            
                Update user
                <b><?php echo $user['name'] ?></b> </h3>
                <?php else: ?>  
                <h3>Create user</h3> 
                <?php endif ?>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label >Name</label>
                    <input name="name" type="text" value="<?php echo $user['name'] ?>" class="form-control <?php echo $errors['name']  ? 'is-invalid' : '' ?> " id="name">
                    <div class="invalid-feedback">
                        <?php echo $errors['name'] ?>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label >Username</label>
                    <input name="username" type="text" value="<?php echo $user['username'] ?>" class="form-control <?php echo $errors['username']  ? 'is-invalid' : '' ?> " id="username">
                    <div class="invalid-feedback">
                        <?php echo $errors['username'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label >Email</label>
                    <input name="email" type="text" value="<?php echo $user['email'] ?>" class="form-control <?php echo $errors['email']  ? 'is-invalid' : '' ?> " id="email">
                    <div class="invalid-feedback">
                        <?php echo $errors['email'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label >Phone</label>
                    <input name="phone" type="text" value="<?php echo $user['phone'] ?>" class="form-control <?php echo $errors['phone']  ? 'is-invalid' : '' ?> " id="phone">
                    <div class="invalid-feedback">
                        <?php echo $errors['phone'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label >Website</label>
                    <input name="website" type="text" value="<?php echo $user['website'] ?>" class="form-control <?php echo $errors['website']  ? 'is-invalid' : '' ?> " id="website">
                    <div class="invalid-feedback">
                        <?php echo $errors['website'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label >Image</label>
                    <input name="picture" type="file" class="form-control-file" id="website">
                </div>

                <button class="btn btn-success">Submit</button>

                
            </form>
        </div>
    </div>
</div>