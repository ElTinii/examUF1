<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Movies</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-md-auto gap-2">
        <li class="nav-item align-self-center">
          <form method="GET" action="index.php" class="input-group input-group-sm">
            <input type="search" name="search" class="form-control" placeholder="Search a movie" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>"/>
            <button type="submit" title="Search a movie" class="btn btn-secondary">
              <i class="icon-search"></i>
            </button>
          </form>
        </li>
        <li class="nav-item rounded">
          <a class="nav-link <?php echo $homeActive ?>" aria-current="page" href="index.php"><i
              class="bi bi-house-fill me-2"></i><span class="icon-home"></span>Home</a>
        </li>
        <li class="nav-item dropdown rounded">
          <?php
          if ($anonUser)
            echo <<<STR
                <a class="nav-link dropdown-toggle $loginActive $signupActive" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill me-2"></i><span class="icon-user-o"></span> Sign in </a>
                <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item $loginActive" href="login.php"><span class="icon-user-o"></span> Log in</a></li>
                <li><a class="dropdown-item $signupActive" href="sign-up.php"><span class="icon-user-plus"></span> Sign up</a></li>
            STR;

          else echo <<<STR
                <a class="nav-link dropdown-toggle $createActive $passwordActive" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill me-2"></i><span class="icon-user-o"></span> $nickname</a>
                <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item $createActive" href="edit.php"><span class="icon-plus"></span> New post</a></li>
                <li><a class="dropdown-item $passwordActive $changePasswordVisibility" href="change-password.php"><span class="icon-key"></span> Change password</a></li>
                <li><a class="dropdown-item " href="recovery-password.php"><span class="icon-key"></span> Recovery password</a></li>
                <div class="dropdown-divider"></div>
                <li><a class="dropdown-item" href="clear-session.php"><span class="icon-logout"></span> Log out</a></li>
                STR;

          ?>
      </ul>
      </li>
      </ul>
    </div>
  </div>
</nav>