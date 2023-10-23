<?php

require_once '../model/pdo-articles.php';
require_once '../controller/input-common.php';
require_once '../controller/images.php';
require_once '../controller/session.php';

$errors = [];

session_start();
$userId = getSessionUserId();

if ($userId == 0) {
    header('Location: login.php');
    return;
}

if (isset($_GET['id'])) {
    $articleId = $_GET['id']; 
    $_SESSION["articleId"] = $articleId; 
    $articleOwnerID = getPostOwnerID($articleId); 
    if ($articleOwnerID != $userId) {
        header('Location: index.php');
        return;
    }

    $article = getPost($articleId);
    $title = $article['title'];
    $director = $article['director'];
    $link = $article['link'];
    $ytLink = $article['youtube_link'];
    $synopsis = $article['synopsis'];

} else if (isset($_POST['guardar'])) {   
    $imagePath = "";
    $title = sanitizeString($_POST['title']);
    $director = sanitizeString($_POST['director']);
    $link = sanitizeString($_POST['link']);
    $ytLink = sanitizeString($_POST['youtube']);
    $synopsis = sanitizeString($_POST['synopsis']);    
    
    checkUserInput($title, $director, $link, $ytLink, $synopsis);
    
    // Si no tenim errors, procedim a actualitzar l'article
    if (empty($errors)) {
        if (isset($_SESSION["articleId"])) {
            $articleId = $_SESSION["articleId"];
            updatePost($articleId, $title, $director, $link, $ytLink, $synopsis);
        } else {
            $articleId = createPost($userId, $title, $director, $link, $ytLink, $synopsis);
            $_SESSION["articleId"] = $articleId;
        }

    } else {
        $articleId = $_SESSION["articleId"];
    }
    $article = getPost($articleId);

} else unset($_SESSION['articleId']);

require_once '../view/edit.view.php';

// Funcions

/**
 * Comprova l'input de l'usuari i, si hi ha errors, emplenar array global d'errors
 *
 * @param string $title títol
 * @param string $director director
 * @param string $link enllaç de referència
 * @param string $ytLink link del trailer de YouTube
 * @param string $synopsis sinopsi
 * 
 */
function checkUserInput($title, $director, $link, $ytLink, $synopsis)
{
    global $errors;

    // Comprovar títol
    if (empty($title))
        $errors['title'] = "Please, type the title.";
    else if (strlen($title) > 120)
        $errors['title'] = "Title can't be longer than 184 characters.";
        
    // Comprovar director
    if (empty($director))
        $errors['director'] = "Please, type the director.";
    else if (strlen($director) > 100)
        $errors['director'] = "Director's name or names too long.";

    // Comprovar link de referència
    if (empty($link))
        $errors['link'] = "Please, insert the reference link.";
    else if (strlen($link) > 2000)
        $errors['link'] = "Reference link too long.";
    else checkLink($link);

    // Comprovar enllaç de YouTube
    if (empty($ytLink))
        $errors['youtube'] = "Please, insert the YouTube trailer link.";
    else if (strlen($ytLink) > 60)
        $errors['youtube'] = "YouTube link too long.";
    else checkYoutubeLink($ytLink);

    // Comprovar contingut de l'article
    if (empty($synopsis))
        $errors['synopsis'] = "Please, type the synopsis.";
    elseif (strlen($synopsis) > 1500)
        $errors['synopsis'] = "Synopsis too long.";
}

/**
 * Comprova el format d'un URL genèric
 * i, en cas d'errors, omple l'array global d'errors
 *
 * @param string $link URL de l'enllaç a comprovar
 * 
 */
function checkLink($link)
{
    global $errors;
    define("URL_REGEXP", "/^(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})$/i");

    if (!preg_match(URL_REGEXP, $link)) {
        $errors['link'] = "Wrong reference link format.";
    }
}


/**
 * Comprova el format i l'existència d'un video de YouTube
 * i, en cas d'errors, omple l'array global d'errors
 *
 * @param string $link link del video de YouTube
 * 
 */
function checkYoutubeLink($link)
{
    global $errors;

    if (!preg_match(YOUTUBE_REGEXP, $link)) {
        $errors['youtube'] = "Wrong YouTube video link format.";
    } else if (!ytVideoExists($link)) {
        $errors['youtube'] = "This YouTube video doesn't exist.";
    }
}

/**
 * Comprova si un video de YouTube existeix
 *
 * @param string $link ID del video de YouTube
 * 
 * @return boolean si existeix el video o no
 */
function ytVideoExists($link)
{
    $videoId = getYoutubeVideoId($link);

    $theURL = "https://img.youtube.com/vi/$videoId/0.jpg";
    $headers = get_headers($theURL);

    // Si al header té el error code 404, el vídeo no existeix
    return (substr($headers[0], 9, 3) !== "404");
}