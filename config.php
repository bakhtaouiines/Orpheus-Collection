<?php
session_start();
//Création des constantes de configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'projet_titre_pro');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('ROLE_ADMIN' , 100);
define('ROLE_NOT_USER' , 0);

define('TARGET', 'assets/images/upload/');  // Repertoire cible de l'avatar
// avatar par défaut:
$defaultImage = 'assets\images\default_image.png';

/**
 * fonction pour contrôler l'accès à certaines pages ; on contrôle en fonction du niveau de rôle de l'utilisateur
 * 
 */
function authorizedAccess($levelMin)
{
    if (!isset($_SESSION['user']['isConnected']) || !$_SESSION['user']['isConnected'] || $_SESSION['user']['levelAccess'] < $levelMin) {
        header('Location: ../index.php');
        exit;
    }
}

/**
 * fonction pour vérifier que l'utilisateur est bien connecté pour empêcher l'accès à certaines pages(si non connecté)
 *
 * @return boolean
 */
function isConnected()
{
    if (isset($_SESSION['user']['isConnected']) && $_SESSION['user']['isConnected']) {
        return true;
    } else {
        return false;
    }
}