

<?php

/**
 * Crea una nova connexió amb la base de dades
 *
 * @return PDO objecte PDO amb la connexió
 */
function getConnection()
{
    try {
        return new PDO(sprintf('mysql:host=%s;dbname=%s',"localhost", "examuf1_db"), "root","");
    } catch (PDOException $e) {
        die("No es pot establir connexió amb la base de dades");
    }
}
?>