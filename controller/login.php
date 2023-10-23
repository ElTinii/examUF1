<?php

require_once '../model/pdo-users.php';
//Ex1
//require_once '../controller/input-common.php';
//require_once '../controller/session.php';
//Faig aixo per que no toca res sensible 
include_once '../controller/input-common.php';
include_once '../controller/session.php';
$errors = [];
$email;
$password;

session_start();
$userId = getSessionUserId();
if ($userId != 0) {
    redirectHome();
    return;
}

if (isset($_POST['submit'])) {
    onSubmit();
}

require_once '../view/login.view.php';

function onSubmit()
{
    global $errors, $email, $password;

    $email = $_POST['email'];
    $password = $_POST['password'];
    $keepSession = isset($_POST['keep-session']);


    checkUserInput($email, $password);

    if (empty($errors))
        login($email, $keepSession);

    if (isset($_SESSION["loginTries"]))
        $_SESSION["loginTries"]++;
        else $_SESSION["loginTries"] = 1;
}

/**
 * Comprova l'input de l'usuari i si n'hi ha errors, els afegeix a l'array global d'errors
 *
 * @param string $email email de l'usuari
 * @param string $password password
 * 
 */
function checkUserInput($email, $password)
{
    global $errors;

    checkEmail($email, false);
    if (empty($password))
        $errors['password'] = "Password can't be empty.";

    if (!empty($errors))
        return;

    if (!userExistsByEmail($email)) {
        $errors['email'] = "This user email doesn't exist.";
        return;
    }
    //Ex11
    //$md5Hash = md5($password);
    //Aqui el que he fet es canviar la manera d'encriptar
    $encr_pass = password_hash($password,PASSWORD_DEFAULT);
    $md5HashDB = getUserHash($email);
//Aqui el que he fet es afegir la funcio password verify
    if (password_verify($encr_pass,$md5HashDB)) {
        $errors['password'] = "Wrong password.";
        return;
    }
}

/**
 * Inicia sessió a l'usuari i el redirigeix a l'inici
 *
 * @param string $email email de l'usuari
 * 
 */
function login($email, $keepSession)
{
    if (isset($_SESSION["loginTries"]))
        unset($_SESSION["loginTries"]);

    startSession($email, $keepSession);
    redirectHome();
}