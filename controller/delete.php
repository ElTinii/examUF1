
<?php

require_once '../model/pdo-articles.php';
require_once '../controller/session.php';

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
        redirectHome();
        return;
    }

    deletePost($articleId);
    redirectHome();
}
?>