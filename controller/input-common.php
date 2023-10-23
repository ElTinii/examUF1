

<?php

define("YOUTUBE_REGEXP", "/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube(-nocookie)?\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)/");

/**
 * Comprova errors en les contrasenyes:
 *
 * @param string $password1 contrasenya 1
 * @param string $password2 contrasenya 2
 * 
 */
function checkPasswords($password1, $password2) {
    global $errors;

    if (empty($password1) || empty($password2)) $errors['password'] = "Password can't be empty.";
    else if ($password1 != $password2) $errors['password'] = "Passwords don't match.";
    else if (strlen($password1) > 30) $errors['password'] = "Password too long.";
    else if (strlen($password1) < 8) $errors['password'] = "Password is too short.";
    else if (!preg_match("#[0-9]+#", $password1)) $errors['password'] = "Password must include at least one number.";
    else if (!preg_match("#[a-zA-Z]+#", $password1)) $errors['password'] = "Password must include at least one letter.";
}

/**
 * Converteix caràcters especials en entitats HTML
 * i elimina espais en blanc a l'inici i final
 *
 * @param string $string string a sanejar
 * 
 * @return string string sanejat
 */
function sanitizeString($string) {
    return trim(htmlspecialchars($string));
}

function checkEmail($email, $checkIfExists) {
    global $errors;

    if (empty($email)) $errors['email'] = "Email can't be empty";
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Wrong email format.";
    else if (userExistsByEmail($email) && $checkIfExists) $errors['email'] = "Email already exists.";

    else return false;
    return true;
}

/**
 * Obté la part de l'ID d'un enllaç d'un video de YouTube
 *
 * @param string $link enllaç del video de YouTube
 * 
 * @return string la ID del video
 */
function getYoutubeVideoId($link)
{
    $matches = [];
    if (preg_match(YOUTUBE_REGEXP, $link, $matches)) return end($matches);
    return "error";
}
?>