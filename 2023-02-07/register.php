<?php require_once('./controller/Register.php'); ?>
<?php
    $Register = new Register();
    $Response = [];
    $active = $Register->active;
    if(isset($_POST) && count($_POST) > 0) $Response = $Register->register($_POST);
?>
<?php require('inc/nav.php'); ?>
<main role="main" class="container pt-5">

    <div class="row justify-content-center mt-5">
        <div class="col-xs-12 col-xl-6 center-align center-block">
            <?php if (isset($Response['status']) && !$Response['status']) : ?>
                <br>
                <div class="alert alert-danger" role="alert">
                    <span><B>Oops!</B> Some errors occurred in your form.</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" class="text-danger">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card shadow p-3 mb-5">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
                    <h4 class="h3 mb-3 font-weight-normal text-center">Register</h4>
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            <label for="inputName" class="sr-only">Names</label>
                            <input type="text" id="inputName" class="form-control" placeholder="Enter Full Name"
                                   name="name" required autofocus
                                   value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
                            <?php if (isset($Response['name']) && !empty($Response['name'])): ?>
                                <small class="text-danger"><?php echo $Response['name']; ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            <label for="inputEmail" class="sr-only">Email</label>
                            <input type="email" id="inputEmail" class="form-control" placeholder="Enter Email Address"
                                   name="email" required autofocus
                                   value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                            <?php if (isset($Response['email']) && !empty($Response['email'])): ?>
                                <small class="text-danger"><?php echo $Response['email']; ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            <label for="inputPhone" class="sr-only">Phone Number</label>
                            <input type="text" id="inputPhone" class="form-control" placeholder="Enter Phone"
                                   name="phone" required autofocus
                                   value="<?php if (isset($_POST['phone'])) echo $_POST['phone'] ?>">
                            <?php if (isset($Response['phone']) && !empty($Response['phone'])): ?>
                                <small class="text-danger"><?php echo $Response['phone']; ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" name="password" id="inputPassword" class="form-control"
                                   placeholder="Password" required>
                            <?php if (isset($Response['password']) && !empty($Response['password'])): ?>
                                <small class="text-danger"><?php echo $Response['password']; ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>
</body>
</html>
