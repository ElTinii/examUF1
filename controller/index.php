<?php
session_start();
require_once '../model/pdo-articles.php';
require_once '../controller/session.php';
//Ex7.1
//He afegit aquest if que el que fa es que cuan selecciones una de les opcions es posa aquella, sino hi ha ninguna seleccionada es mantindra 10 per defecte
if (isset($_GET['postsPerPage'])){
    $_SESSION['postPerPage'] = $_GET['postsPerPage'];
}
else{
    $_SESSION['postPerPage'] = 10;
}

$postsPerPage = $_SESSION['postPerPage'];

//Ex7.2
//Estic fent el mateix que per la part de post per pagina 
if (isset($_GET['orderBy'])){
    $_SESSION['orderBy'] = $_GET['orderBy'];
}
else{
    $_SESSION['orderBy'] = 'date-desc';
}
$orderBy = $_SESSION['orderBy'];

$searchTerm = "";
if (isset($_GET['search'])) $searchTerm = $_GET['search'];

$userId = getSessionUserId();

$nArticles = getCountOfPosts($userId, $searchTerm); 
$nPages = ceil($nArticles / $postsPerPage); 

if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

if ($nArticles > 0 && ($currentPage > $nPages || $currentPage < 1)) {
    header("Location: index.php");
}

$ndxArticle = $postsPerPage * ($currentPage - 1);

$articles = getPosts($userId, $ndxArticle, $postsPerPage, $orderBy, $searchTerm); 

if ($currentPage <= 3) $backScope = $currentPage - 1;
else $backScope = 3;
if ($currentPage + 3 > $nPages) $frontScope = $nPages - $currentPage;
else $frontScope = 3;


$firstPage = $currentPage == 1;
$lastPage = $currentPage == $nPages;

$firstPageClass = $firstPage ? 'disabled' : '';
$lastPageClass = $lastPage ? 'disabled' : '';

$searchQuery = !empty($searchTerm) ? "?search=$searchTerm&" : "?";
$nextPageLink = $lastPage ? "#" : $searchQuery . "page=" . ($currentPage + 1);
$previousPageLink = $firstPage ? "#" : $searchQuery . "page=" . ($currentPage - 1);
$firstPageLink = $firstPage ? "#" : $searchQuery . "page=1";
$lastPageLink = $lastPage ? "#" : $searchQuery . "page=$nPages";

//require_once '../view/index.view.php';
//Ex1
include_once '../view/index.view.php'; //En ningun moment esta tocant la base de dades, es pot cridar amb include que es mes rapid