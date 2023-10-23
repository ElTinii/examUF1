<?php

require_once "../model/pdo-users.php";

/**
 * Inicia la sessió d'un usuari per email
 *
 * @param string $email email
 */
function startSession($email, $keepSession)
{
    setSessionLifeTime();
    session_start();
    $userId = getUserId($email); 
    if ($keepSession) {
        $rememberMeToken = bin2hex(random_bytes(16)); 
        setRememberMeToken($userId, $rememberMeToken);
        setcookie("rememberme", $rememberMeToken, 2147483647);
    }

    $_SESSION["userId"] = $userId; 
}

/**
 * Inicia la sessió d'un usuari per ID
 *
 * @param string $userId ID de l'usuari
 */
function startSessionByUserId($userId)
{
    setSessionLifeTime();
    session_start();
    $_SESSION["userId"] = $userId;
}

function setSessionLifeTime()
{    
    ini_set('session.gc_maxlifetime', 1800);
    ini_set('session.cookie-lifetime', 1800);
}

/**
 * Tenca la sessió de l'usuari, elimina la cookie de rememberme i redirigeix a l'inici
 */
function logout()
{
    setcookie('rememberme', false); 
    session_start();
    session_destroy();
    redirectHome();
    
}

/**
 * Redirigeix l'usuari a l'inici
 */
function redirectHome()
{
    header('Location: index.php');
}


/**
 * Obeté la ID de l'usuari via session o per token remember me
 *
 * @return int ID de l'usuari
 */
function getSessionUserId() {
    if (isset($_SESSION["userId"])) {
        return $_SESSION["userId"];
    } else {
        return 0;
    }
}