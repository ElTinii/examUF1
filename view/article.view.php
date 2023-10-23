

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../view/bootstrap/css/bootstrap.min.css">
    <script src="../view/bootstrap/js/bootstrap.min.js"></script>
    <!-- Delete confirm modal script -->
    <script src="../view/scripts/confirm-dialog.js"></script>
    <!-- jquery -->
    <script src="../view/jquery/jquery-3.6.1.min.js"></script>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="../view/fontello/css/fontello.css">
    <!-- Estils propis -->
    <link rel="stylesheet" href="../view/styles.css">
    <!-- Establir com a títol de la pàgina el nom de la pel·lícula  -->
    <title><?php echo $article['title'] ?></title>
    <link rel="shortcut icon" href="../view/images/favicon.ico" type="image/x-icon">
</head>

<body>
<?php require_once '../controller/navbar.php' ?>
    <!-- Background image -->
    <header class="text-center bg-image" style="
      background-image: url('../uploads/<?php echo $article['image_path'] . "?" . $filetime ?>?');
      background-position: center;
      background-size: cover;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="p-5 d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3"><?php echo $article['title'] ?></h1>
                    <h4 class="mb-3"><?php echo $article['director'] ?></h4>
                </div>
            </div>
        </div>
    </header>
    <main class="container mt-5">
        <div class="row justify-content-center">

            <aside class="col-md-3 col-11 order-md-1 order-2 me-md-5">

                <h4 class="mb-3 mt-md-0 mt-5">About this article</h4>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class='icon-user-o' title='Article author'> Author: <span class="text-muted"><?php echo $article['nickname'] ?></span></span>
                        </li>
                        <li class="list-group-item">
                            <span class='icon-calendar' title='Article creation date'> Creation date: <span class="text-muted"><?php echo explode(" ", $article['dateTime'])[0] ?></span></span>
                        </li>
                        <li class="list-group-item">
                            <span class='icon-clock' title='Article creation hour'> Creation hour: <span class="text-muted"><?php echo explode(" ", $article['dateTime'])[1] ?></span></span>
                        </li>
                        <li class="list-group-item">
                            <a href='<?php echo $article['link'] ?>' target='_blank'><span class='d-block icon-link' title='Reference link'> Reference link</span></a>
                        </li>
                    </ul>
                </div>

                <?php
                $id = $article['id'];

                if ($userId == $article['user_id']) {
                    echo "
                    <h4 class='mt-3 mb-3'>Manage this article</h4>
                    <div class='card'>
                    <ul class='list-group list-group-flush'>
                    <li class='list-group-item'>
                        <a href='edit.php?id=$id'>
                            <span class='d-block icon-pencil' title='Edit article'>Edit this article</span>
                        </a>
                    </li>
                    <li class='list-group-item'>
                        <a class='link-danger' onclick='show_confirm($id)'>
                            <span class='d-block icon-trash pointer' title='Delete article'>Delete this article</span>
                        </a>
                    </li>
                    </ul>
                    </div>";
                }
                ?>

                <!-- Carrusel de les últimes pel·lícules -->
                <h4 class='mt-3 mb-3'>Latest posts</h4>

                <?php

                if (!empty($latestPosts)) {
                    echo "
                            <div id='carousel' class='carousel slide p-1' data-bs-ride='carousel'>
                                <div class='carousel-inner'>";

                    for ($i = 0; $i < count($latestPosts); $i++) {
                        $lpImagePath = $latestPosts[$i]['image_path'];
                        $lpImagePath = empty($lpImagePath) ? "../view/images/no-preview.png" : "../uploads/$lpImagePath";
                        $lpFiletime = filemtime("$lpImagePath");
                        $lpTitle = $latestPosts[$i]['title'];
                        $lpId = $latestPosts[$i]['id'];
                        $active = $i == 0 ? "active" : "";

                        echo "
                                    <div class='carousel-item $active'>
                                        <a href='article.php?id=$lpId' title=\"$lpTitle\">
                                            <img src='../uploads/$lpImagePath?$lpFiletime' alt=\"$lpTitle\" class='d-block w-100 rounded img-thumbnail' data-bs-interval='2000'>
                                        </a>
                                    </div>
                                ";
                    }

                    echo "
                                    <button class='carousel-control-prev' type='button' data-bs-target='#carousel'
                                    data-bs-slide='prev'>
                                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                        <span class='visually-hidden'>Previous</span>
                                    </button>
                                    <button class='carousel-control-next' type='button' data-bs-target='#carousel'
                                        data-bs-slide='next'>
                                        <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                        <span class='visually-hidden'>Next</span>
                                    </button>
                                </div>
                            </div>";
                } else echo "<span class='icon-info-circled'> No recent posts</span>"
                ?>
            </aside>

            <!-- Content -->
            <section class="col-md-7 col-12 order-md-2 order-1 mt-md-0 mt-5">
                <h2 class="mb-2">
                    <a href="index.php" title="Go home"><span class="icon-left-open-1"></span></a>
                    <?php echo $article['title'] ?>
                </h2>

                <hr class="mb-4">

                <h5 class="mb-1">Synopsis</h5>

                <p class="mb-4" style="white-space: pre-line;">
                    <?php echo $article['synopsis'] ?>
                </p>
                <h5 class="mb-4">Movie trailer</h5>
                <div class="youtube">
                    <iframe class="mb-5" src="https://www.youtube.com/embed/<?php echo isset($ytId) ? $ytId : "error" ?>" title="Movie trailer" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </section>
        </div>
    </main>

    <!-- Delete confirm modal -->
    <?php include_once '../view/confirm-modal.view.php' ?>

    <!-- Footer -->
    <?php include_once '../view/footer.view.php' ?>
</body>

</html>