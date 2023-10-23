<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Log in</title>
  <!-- Favicon -->
	<link rel="shortcut icon" href="../view/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../view/bootstrap/css/bootstrap.min.css">
  <script src="../view/bootstrap/js/bootstrap.min.js"></script>
  <!-- Fontawesome -->
  <link rel="stylesheet" href="../view/fontello/css/fontello.css">
  <title>Login</title>
  <!-- Estils propis -->
  <link rel="stylesheet" href="../view/styles.css">

</head>

<body>
<?php require_once '../controller/navbar.php' ?>

  <main class="container py-5">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-5 d-md-block d-none">
        <img src="../view/images/login.jpg" class="img-fluid" alt="Log in">
      </div>
      <div class="col-md-6 col-12">
        <h2 class="mb-4">Log in</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" novalidate>
          <form>
            <!-- Email input -->
            <div class="form-floating mb-4">
              <input type="email" name="email" id="email" placeholder="name@example.com" class="form-control form-control-lg <?php echo isset($errors['email']) ? "is-invalid" : "" ?>" value="<?php echo isset($email) ? $email : '' ?>" />
              <label for="email">Email address</label>
              <?php
              // Mostrar errors de validació, si n'hi ha
              if (isset($_POST['email'])) {
                if (isset($errors['email'])) {
                  $error = $errors['email'];
                  echo "<div class='invalid-feedback'>$error</div>";
                }
              }
              ?>
            </div>

            <!-- Password input -->
            <div class="form-floating mb-4">
              <input type="password" name="password" id="password" placeholder="Password" class="form-control form-control-lg <?php echo isset($errors['password']) ? "is-invalid" : "" ?>" value="<?php echo isset($password) ? $password : '' ?>" />
              <label for="password">Password</label>
              <?php
              // Mostrar errors de validació, si n'hi ha
              if (isset($_POST['password'])) {
                if (isset($errors['password'])) {
                  $error = $errors['password'];
                  echo "<div class='invalid-feedback'>$error</div>";
                }
              }
              ?>
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check pointer">
                <label class="form-check-label pointer" for="keep-session"> Remember me </label>
                <input class="form-check-input pointer" type="checkbox" value="true" name="keep-session" id="keep-session" checked />
              </div>
            </div>
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block col-12" style="background-color: #4A48F4" title="Log me in">Log in</button>

          </form>
      </div>
  </main>


  <!-- Footer -->
  <?php include_once '../view/footer.view.php' ?>
</body>

</html>