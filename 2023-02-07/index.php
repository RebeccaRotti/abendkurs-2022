<?php  ?>
<?php

?>
  <?php require('inc/nav.php'); ?>
    <main role="main" class="container pt-5">
        <div class="row justify-content-center mt-5">
          <div class="col-xs-12 col-xl-6 center-align center-block">
            <?php if (isset($Response['status']) && !$Response['status']) : ?>
            <div class="alert alert-danger" role="alert">
              <span><B>Oops!</B> Invalid Credentials Used.</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-danger">&times;</span>
              </button>
            </div>
            <?php endif; ?>
            <div class="card shadow p-3 mb-5">
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
              <h4 class="h3 mb-3 font-weight-normal text-center">Sign in</h4>
              <div class="col-12 mt-4">
                <div class="form-group">
                  <label for="inputEmail" class="sr-only">Email address</label>
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                </div>
              </div>
              <div class="col-12 mt-4">
                <div class="form-group">
                  <label for="inputPassword" class="sr-only">Password</label>
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>
              </div>
              <div class="col-12 mt-4">
                <button class="btn btn-primary" type="submit">Sign in</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    </main>
    <?php
    include_once ('inc/script.inc.php');
    ?>
  </body>
  </html>
