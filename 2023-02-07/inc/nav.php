<?php require_once('./config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
    include_once ('head.inc.php')
    ?>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">PHP Übung</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">

            <?php if (!isset($_SESSION['auth_status'])) : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>index.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>register.php">Register</a>
              </li>
            <?php elseif (isset($_SESSION['auth_status'])) : ?>
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>index.php" class="nav-link">Dashboard</a>
              </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['auth_status'])) : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>todo.php">ToDo</a>
              </li>
            <?php endif; ?>
              <?php if (isset($_SESSION['auth_status'])) : ?>
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo BASE_URL; ?>logout.php">Logout</a>
                  </li>
              <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
