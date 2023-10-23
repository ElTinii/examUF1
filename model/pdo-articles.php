
<?php

require_once 'db-connection.php';


 /**
 * Obté els posts de la base de dades
 *
 * @param int $userId ID d'usuari dels articles que volem
 * @param int $ndxArticle posició de l'article actual
 * @param int $postsPerPage quantitat d'articles que volem
 * @param string $searchTerm string de búsqueda, o "" si no volem fer búsqueda per terme
 * 
 * @return array amb tots els articles
 */
function getPosts($userId, $ndxArticle, $postsPerPage, $orderBy, $searchTerm)
{    
    switch ($orderBy) {
        case 'date-asc':
            $orderBySQL = "ORDER BY id ASC";
            break;
        case 'title-asc':
            $orderBySQL = "ORDER BY title ASC";
            break;
        case 'title-desc':
            $orderBySQL = "ORDER BY title DESC";
            break;
        case 'date-desc':
        default:
            $orderBySQL = "ORDER BY id DESC";
            break;
    }

    if (!empty($searchTerm)) {
        $whereClause = "WHERE title LIKE \"%$searchTerm%\" OR synopsis LIKE \"%$searchTerm%\"";
        $andClause = str_replace('WHERE', 'AND', $whereClause);
    }
    else $whereClause = $andClause = "";

    try {
        $connexio = getConnection();
        $statement = "";

        if ($userId == 0) $statement = $connexio->prepare("
        SELECT title, director, link, synopsis, id, dateTime, image_path, user_id,
        (SELECT nickname FROM users WHERE id = user_id) AS nickname
        FROM posts
        $whereClause
        $orderBySQL
        LIMIT :qty OFFSET :ndx");
        else {
            $statement = $connexio->prepare("
            SELECT title, director, link, synopsis, id, dateTime, image_path, user_id,
            (SELECT nickname FROM users WHERE id = user_id) AS nickname
            FROM posts 
            WHERE user_id = :userId
            $andClause
            $orderBySQL
            LIMIT :qty OFFSET :ndx");
            $statement->bindParam('userId', $userId, PDO::PARAM_INT);
        }

        $statement->bindParam('ndx', $ndxArticle, PDO::PARAM_INT);
        $statement->bindParam('qty', $postsPerPage, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetchAll();
    } catch (PDOException $e) {
        die("No es pot establir connexió amb la base de dades");
    }
}


/**
 * Obté els últims n posts
 *
 * @param int $nPosts quantitat de posts
 * 
 * @return array amb els posts (title, id i image_path)
 */
function getLatestPosts($nPosts)
{
    try {
        $connexio = getConnection();

        $statement = $connexio->prepare("
        SELECT title, id, image_path 
        FROM posts 
        WHERE image_path IS NOT NULL AND image_path <> ''
        ORDER BY id DESC
        LIMIT :qty");

        $statement->bindParam('qty', $nPosts, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetchAll();
    } catch (PDOException $e) {
        die("No es pot establir connexió amb la base de dades");
    }
}

/**
 * Obté un array amb les dades d'un article
 *
 * @param int $articleId id de l'article a consultar
 * 
 * @return array amb les dades de l'article
 */
function getPost($articleId)
{
    try {
        $connexio = getConnection();

        $statement = $connexio->prepare('
        SELECT title, director, link, youtube_link, synopsis, id, dateTime, image_path, user_id,
        (SELECT nickname FROM users WHERE id = user_id) AS nickname
        FROM posts WHERE id = :articleId');

        $statement->bindParam('articleId', $articleId, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetch();
    } catch (PDOException $e) {
        die("No es pot establir connexió amb la base de dades");
    }
}

/**
 * Obté el id de l'autor a partir d'un id d'article
 *
 * @param mixed $articleId
 * 
 * @return [type]
 */
function getPostOwnerID($articleId)
{
    try {
        $connexio = getConnection();

        $statement = $connexio->prepare('SELECT user_id FROM posts WHERE id = :articleId');

        $statement->bindParam('articleId', $articleId, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetch()['user_id'];
    } catch (PDOException $e) {
        die("No es pot establir connexió amb la base de dades");
    }
}

/**
 * Obtindre la quantitat d'articles que es troben a la base de dades
 *
 * @param int $userId ID d'usuari dels articles que volem
 * @param string $searchTerm string de búsqueda, o "" si no volem fer búsqueda per terme
 * 
 * @return integer enter amb la quantitat d'articles
 */
function getCountOfPosts($userId, $searchTerm)
{
    if (!empty($searchTerm)) {
        $whereClause = "WHERE title LIKE \"%$searchTerm%\" OR synopsis LIKE \"%$searchTerm%\"";
        $andClause = str_replace('WHERE', 'AND', $whereClause);
    }
    else $whereClause = $andClause = "";

    try {
        $connexio = getConnection();

        if ($userId == 0) $statement = $connexio->prepare("SELECT COUNT(*) AS qt FROM posts $whereClause");
        else {
            $statement = $connexio->prepare("
            SELECT COUNT(*) AS qt FROM posts WHERE user_id = :userId $andClause");
            $statement->bindParam('userId', $userId, PDO::PARAM_INT);
        }

        $statement->execute();

        $resultat = $statement->fetch();

        return $resultat['qt'];
    } catch (PDOException $e) {
        die("No es pot establir connexió amb la base de dades");
    }
}


/**
 * Actualitza la informació d'un article
 *
 * @param int $articleId id de l'article a modificar
 * @param string $title titol de l'article
 * @param string $link enllaç de l'article
 * @param string $article contingut de l'article
 * 
 */
function updatePost($articleId, $title, $director, $link, $ytLink, $article)
{
    try {
        $connexio = getConnection();

        $statement = $connexio->prepare('
        UPDATE posts SET title = :title, director = :director, link = :link, youtube_link = :ytLink, synopsis = :synopsis
        WHERE id = :articleId;');

        $statement->bindParam('articleId', $articleId, PDO::PARAM_INT);
        $statement->bindParam('title', $title);
        $statement->bindParam('director', $director);
        $statement->bindParam('link', $link);
        $statement->bindParam('ytLink', $ytLink);
        $statement->bindParam('synopsis', $article);

        $statement->execute();
    } catch (PDOException $e) {
        die("No es pot establir connexió amb la base de dades");
    }
}

/**
 * Estableix una imatge a un article
 *
 * @param int $articleId id de l'article a modificar
 * @param mixed $imagePath path de la imatge a establir
 * 
 */
function setPostImage($articleId, $imagePath)
{
    try {
        $connexio = getConnection();

        $statement = $connexio->prepare('UPDATE posts SET image_path = :imagePath WHERE id = :articleId');

        $statement->bindParam('imagePath', $imagePath);
        $statement->bindParam('articleId', $articleId, PDO::PARAM_INT);

        $statement->execute();
    } catch (PDOException $e) {
        die("No es pot establir connexió amb la base de dades");
    }
}



/**
 * Crea un article
 *
 * @param int $userId id de l'usuari creador
 * @param string $title titol de l'article
 * @param string $link enllaç de l'article
 * @param string $article contingut de l'article
 * 
 * @return string id del nou article
 */
function createPost($userId, $title, $director, $link, $ytLink, $article)
{
    try {
        $connexio = getConnection();

        $statement = $connexio->prepare('
        INSERT INTO posts (title, director, link, youtube_link, synopsis, user_id)
        VALUES (:title, :director, :link, :ytLink, :synopsis, :userId);');

        $statement->bindParam('title', $title);
        $statement->bindParam('director', $director);
        $statement->bindParam('ytLink', $ytLink);
        $statement->bindParam('link', $link);
        $statement->bindParam('synopsis', $article);
        $statement->bindParam('userId', $userId, PDO::PARAM_INT);

        $statement->execute();
        return $connexio->lastInsertId();

    } catch (PDOException $e) {
        die("No es pot establir connexió amb la base de dades");
    }
}


/**
 * Elimina un article
 *
 * @param int $articleId id de l'article a eliminar
 * 
 */
function deletePost($articleId)
{
    try {
        $connexio = getConnection();

        $statement = $connexio->prepare('DELETE FROM posts WHERE id = :articleId');

        $statement->bindParam('articleId', $articleId, PDO::PARAM_INT);

        $statement->execute();
    } catch (PDOException $e) {
        die("No es pot establir connexió amb la base de dades");
    }
}
