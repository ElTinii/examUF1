<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Sign up</title>
  <!-- Favicon -->
	<link rel="shortcut icon" href="../view/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../view/bootstrap/css/bootstrap.min.css">
  <script src="../view/bootstrap/js/bootstrap.min.js"></script>
  <!-- Fontawesome -->
  <link rel="stylesheet" href="../view/fontello/css/fontello.css">
  <!-- Estils propis -->
  <link rel="stylesheet" href="../view/styles.css">
</head>

<body>
<?php require_once '../controller/navbar.php' ?>

  <main class="container py-5">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-5 d-md-block d-none">
        <img src="../view/images/signup.jpg" class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-6 col-12">
        <h2 class="mb-4">Sign up</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form" method="POST" novalidate>
          <div class="form-floating mb-4">
            <input type="email" name="email" id="email" placeholder="email@example.com" class="form-control form-control-lg <?php echo isset($errors['email']) ? "is-invalid" : "" ?>" value="<?php echo isset($email) ? $email : '' ?>" />
            <label for="email">Email address</label>
            <?php
            if (isset($_POST['submit'])) {
              if (isset($errors['email'])) {
                $error = $errors['email'];
                echo "<div class='invalid-feedback'>$error</div>";
              }
            }
            ?>
          </div>
          <div class="form-floating mb-4">
            <input type="text" name="nickname" id="nickname" placeholder="nickname" class="form-control form-control-lg <?php echo isset($errors['nickname']) ? "is-invalid" : "" ?>" value="<?php echo isset($nickname) ? $nickname : '' ?>" />
            <label for="nickname">Nickname</label>
            <?php
            if (isset($_POST['submit'])) {
              if (isset($errors['nickname'])) {
                $error = $errors['nickname'];
                echo "<div class='invalid-feedback'>$error</div>";
              }
            }
            ?>
          </div>
          <div class="form-floating mb-4">
            <input type="password" name="password1" id="password1" placeholder="password" class="form-control form-control-lg <?php echo isset($errors['password']) ? "is-invalid" : "" ?>" value="<?php echo isset($password1) ? $password1 : '' ?>" />
            <label class="form-label" for="password1">Password</label>
          </div>

          <div class="form-floating mb-4">
            <input type="password" name="password2" id="password2" placeholder="password" class="form-control form-control-lg <?php echo isset($errors['password']) ? "is-invalid" : "" ?>" value="<?php echo isset($password2) ? $password2 : '' ?>" />
            <label for="password2">Password confimation</label>
            <?php
            if (isset($_POST['submit'])) {
              if (isset($errors['password'])) {
                $error = $errors['password'];
                echo "<div class='invalid-feedback'>$error</div>";
              }
            }
            ?>
          </div>

          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block col-12">Sign up</button>
        </form>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include_once '../view/footer.view.php' ?>
</body>

</html>