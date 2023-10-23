<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="../view/bootstrap/css/bootstrap.min.css">
	<script src="../view/bootstrap/js/bootstrap.min.js"></script>
	<!-- Fontawesome -->
	<link rel="stylesheet" href="../view/fontello/css/fontello.css">
	<!-- Estils propis -->
	<link rel="stylesheet" href="../view/styles.css">
	<script src="../view/scripts/prevent-resend-confirmation.js"></script>
	<title>Home</title>
	<link rel="shortcut icon" href="../view/images/favicon.ico" type="image/x-icon">
</head>

<body>
	<!-- Navbar -->
	<?php require_once '../controller/navbar.php' ?>
	<header class="row m-4 text-center">
		<h3>
			<a style="color: black;" href="index.php">
				<?php
					if (empty($searchTerm)) {
						echo $userId == 0 ? "All the movies" : "My movies";
					} else echo "Search results for: " . $searchTerm;

					echo " <span class='badge bg-secondary'>$nArticles</span>"
				?>
			</a>
		</h3>
	</header>
	<main class="container-fluid">
		<section class="row justify-content-center">
			<!-- Si no hi ha articles, mostrem un missatge informatiu -->
			<div class='col-xl-6 col-10 alert alert-primary p-4 <?php echo empty($articles) ? "" : "d-none" ?>'>
				<span class='icon-info-circled'></span>
				Sorry, but there aren't any posts. <a class='alert-link' title='Add one post' href='edit.php'>Add one!</a>
			</div>
				<?php
				if (!empty($articles)) {
					foreach ($articles as $article) {
						if (!empty($article)) {							
							$id = $article['id'];
							$title = $article['title'];
							$title = strlen($title) > 40 ? mb_substr($title, 0, 40, "UTF-8") . "..." : $title;
							$contingut = mb_substr($article['synopsis'], 0, 200, "UTF-8"); // a la pantalla principal mostrarem només una part de la sinopsis
							$nickname = $article['nickname'];
							$dateTime = $article['dateTime'];
							$date = explode(" ", $dateTime)[0];
							$time = explode(" ", $dateTime)[1];
							$imagePath = $article['image_path'];
							$filetime = filemtime("../uploads/$imagePath");

							// Card responiva
							echo "<div class='col-xxl-2 col-xl-3 col-lg-4 col-md-4 col-sm-11 col-11 p-0 m-md-2 m-2 card post-shadow'>";
						
							if (empty($imagePath)) echo "<img class='card-img-top img-fluid no-fit' src='../view/images/no-preview.png' alt='Imatge de portada'>";
							else echo "<img class='card-img-top img-fluid cover' src='../uploads/$imagePath?$filetime' alt='$title'>";
							
							// Mostrem el cos de l'article
							echo "
								<div class='card-body'>
									<h5 class='card-title'>$title</h5>
									<p class='card-text' >$contingut <a title=\"Read more about $title\" class='stretched-link' href='article.php?id=$id'>[...]</a></p>
									<p class='card-text'>
								</div>
									<div class='card-footer text-muted'>
									<span class='icon-user-o' title='Post author'> $nickname </span>
									<span class='icon-calendar' title='Post creation date'> $date </span>
									<span class='icon-clock d-none' title='Post creation hour'> $time </span>";

							if ($userId == $article['user_id']) {
								echo "
									<a href='edit.php?id=$id'><span class='icon-pencil' title='Edit post'></span></a>
									<!-- <a href='eliminar.php?id='><span class='icon-trash' title='Eliminar article'></span></a> -->";
							}

							echo "
								</div>
							</div>";
						} else break;
					}
				}
				?>
		</section>

		<nav class="m-4">
			<ul class="pagination justify-content-center">
				<?php
				if (!empty($articles)) {					
					echo "
						<li class='page-item $firstPageClass'>
							<a title='First page' class='page-link' href='$firstPageLink'>
								<span class='icon-left-open-1'></span>
								<span class='icon-left-open-1 offset'></span>
							</a>
						</li>";
					echo "
						<li class='page-item $firstPageClass'>
							<a title='Previous page' class='page-link' href='$previousPageLink'>
								<span class='icon-left-open-1'></span>
							</a>
						</li>";
					for ($i = $currentPage - $backScope; $i <= $currentPage + $frontScope; $i++) {
						$class = $currentPage == $i ? 'active' : '';
						echo "
							<li class='page-item $class'>
								<a class='page-link' href='{$searchQuery}page=$i'>$i</a>
							</li>";
					}
					echo "
						<li class='page-item $lastPageClass'>
							<a title='Next page' class='page-link' href='$nextPageLink'>
								<span class='icon-right-open-1'></span>
							</a>
						</li>";
					echo "
						<li class='page-item $lastPageClass'>
							<a title='Last page' class='page-link' href='$lastPageLink'>
								<span class='icon-right-open-1'></span>
								<span class='icon-right-open-1 offset'></span>
							</a>
						</li>";
				}
				?>
			</ul>
			<div class="row justify-content-center <?php echo empty($articles) ? "d-none" : "" ?>">
				<div class="col-md-2 col-6">
					<!-- Desplegable pels articles per pàgina -->
					<form action="index.php" method="post" class="text-center">
						<label for="postsPerPage">Posts per page: </label>
						<select class="form-select " name="postsPerPage" onchange="this.form.submit()">
							<option <?php echo $postsPerPage == 10 ? 'selected' : '' ?> value="10">10</option>
							<option <?php echo $postsPerPage == 15 ? 'selected' : '' ?> value="15">15</option>
							<option <?php echo $postsPerPage == 20 ? 'selected' : '' ?> value="20">20</option>
						</select>
					</form>
				</div>
				<div class="col-md-2 col-6">
					<!-- Desplegable pel mètode d'ordenació dels articles -->
					<form action="index.php" method="post" class="text-center">
						<label for="orderBy">Order by: </label>
						<select class="form-select " name="orderBy" onchange="this.form.submit()">
							<option <?php echo $orderBy == 'date-desc' ? 'selected' : '' ?> value="date-desc">Date (desc)</option>
							<option <?php echo $orderBy == 'date-asc' ? 'selected' : '' ?> value="date-asc">Date (asc)</option>
							<option <?php echo $orderBy == 'title-asc' ? 'selected' : '' ?> value="title-asc">Alphabetically (asc)</option>
							<option <?php echo $orderBy == 'title-desc' ? 'selected' : '' ?> value="title-desc">Alphabetically (desc)</option>
						</select>
					</form>
				</div>
			</div>
		</nav>
	</main>
	<!-- Footer -->
	<?php include_once '../view/footer.view.php' ?>
</body>

</html>