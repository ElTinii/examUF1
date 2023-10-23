<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../view/bootstrap/css/bootstrap.min.css">
    <script src="../view/bootstrap/js/bootstrap.min.js"></script>
    <!-- Delete confirm modal script -->
    <script src="../view/scripts/confirm-dialog.js"></script>
    <!-- jquery -->
    <script src="../view/jquery/jquery-3.6.1.min.js"></script>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="../view/fontello/css/fontello.css">
    <!-- Script propi -->
    <script defer src="../view/scripts/edit-form.js"></script>
    <!-- Estils propis -->
    <link rel="stylesheet" href="../view/styles.css">
    <title>Inici</title>
</head>

<body>

<?php require_once '../controller/navbar.php' ?>

    <main class="container">
        <div class="row justify-content-center h-100">
            <div class="edit d-grid gap-3 p-4 border col-md-10 col-12 align-items-center">

                
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="form" method="POST" novalidate enctype="multipart/form-data">
                    
                    <header class="col-12 d-flex justify-content-between mb-4">
                        <h3>
                            <?php echo isset($_SESSION["articleId"]) ? "Edit" : "Create new" ?> article
                        </h3>
                        <h4>
                            <a type="button" class="btn-close p-0" title="Close" href="index.php"></a>
                        </h4>
                    </header>

                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" title="Go to home"><a href="index.php">Home</a></li>
                        <?php
                        if (isset($_SESSION["articleId"])) {
                            $titleDB = $article['title'];
                            echo "
                            <li class='breadcrumb-item' title='Go to this post'>
                                <a href='article.php?id=$articleId'>$titleDB</a>
                            </li>";
                        }
                        ?>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo isset($_SESSION["articleId"]) ? "Edit" : "Create" ?> article</li>
                    </ol>
                    </nav>

                    <div class="row">

                        <div class="col-md-6 col-12 form-group mb-2">
                            <label for="title">Title*</label>
                            <input type="text" id="title" name="title" placeholder="Type the title" class="form-control <?php echo isset($errors['title']) ? "is-invalid" : "" ?>" value="<?php echo isset($title) ? $title : '' ?>">
                            <?php
                            
                            if (isset($_POST['guardar'])) {
                                if (isset($errors['title'])) {
                                    $error = $errors['title'];
                                    echo "<div class='invalid-feedback'>$error</div>";
                                }
                            }
                            ?>
                        </div>

                        <div class="col-md-6 col-12 form-group mb-2">
                            <label for="director">Director*</label>
                            <input type="text" id="director" name="director" placeholder="Type the director" class="form-control <?php echo isset($errors['director']) ? "is-invalid" : "" ?>" value="<?php echo isset($director) ? $director : '' ?>">
                            <?php
                            
                            if (isset($_POST['guardar'])) {
                                if (isset($errors['director'])) {
                                    $error = $errors['director'];
                                    echo "<div class='invalid-feedback'>$error</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 col-12 form-group mb-2">
                            <label for="link">Reference link*</label>
                            <input type="text" id="link" name="link" placeholder="Type the reference link" class="form-control <?php echo isset($errors['link']) ? "is-invalid" : "" ?>" value="<?php echo isset($link) ? $link : '' ?>">
                            <?php
                            
                            if (isset($_POST['guardar'])) {
                                if (isset($errors['link'])) {
                                    $error = $errors['link'];
                                    echo "<div class='invalid-feedback'>$error</div>";
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-6 col-12 form-group mb-2">
                            <label for="youtube">YouTube trailer link*</label>
                            <input type="text" id="youtube" name="youtube" placeholder="Type the YouTube trailer link" class="form-control <?php echo isset($errors['youtube']) ? "is-invalid" : "" ?>" value="<?php echo isset($ytLink) ? $ytLink : '' ?>">
                            <?php
                            
                            if (isset($_POST['guardar'])) {
                                if (isset($errors['youtube'])) {
                                    $error = $errors['youtube'];
                                    echo "<div class='invalid-feedback'>$error</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="synopsis">Synopsis*</label>
                        <textarea rows="10" id="synopsis" name="synopsis" class="form-control <?php echo isset($errors['synopsis']) ? "is-invalid" : "" ?>"><?php echo isset($synopsis) ? $synopsis : '' ?></textarea>
                        <?php
                        
                        if (isset($_POST['guardar'])) {
                            if (isset($errors['synopsis'])) {
                                $error = $errors['synopsis'];
                                echo "<div class='invalid-feedback'>$error</div>";
                            }
                        }
                        ?>
                    </div>

                    <div class="row mb-2 align-items-end">

                        <div class="form-group col-md-6 col-12">
                            <label for="file">Movie banner</label>
                            <input class="form-control" type="file" id="file" name="file" accept="image/png, image/jpeg">
                        </div>

                        <div class="btn-group mt-3 col-md-6 col-12">
                            <button class="btn btn-outline-primary" type="submit" name="guardar" title="Save post">
                                <span class="icon-floppy"> Save</span>
                            </button>
                            <a class="btn btn-outline-danger" title="Delete post" onclick="show_confirm(<?php echo isset($articleId) ? $articleId : 0 ?>)">
                                <span class="icon-trash"> Delete</span>
                            </a>
                            <button class="btn btn-outline-warning" type="button" id="clear" title="Clear form">
                                <span class="icon-arrows-cw"> Clear</span>
                            </button>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST['guardar']) && empty($errors)) {
                        echo '
                        <div class="alert alert-success mt-4" role="alert">
                            <span class=" icon-ok"></span> Post saved successfully.
                        </div>';
                    }
                    ?>

                </form>
            </div>
        </div>
    </main>

    <!-- Delete confirm modal -->
    <?php include_once '../view/confirm-modal.view.php' ?>

    <!-- Footer -->
    <?php include_once '../view/footer.view.php' ?>
</body>

</html>