<?php

include('varco.php');
//parametres de connexion
mysql_connect($host, $user, $mdp);
mysql_select_db($db);
//creation de session
session_start();

$connecte = false;
//si on a un cookie sid
if (isset($_COOKIE['sid'])) {
    // l'utilisateur est connecté
    // on recupere son sid, son email
    // et on passe la variable connecté en VRAI
    $sid = mysql_real_escape_string($_COOKIE['sid']);
    $sql = "SELECT email FROM utilisateurs WHERE sid='$sid'";
    $req = mysql_query($sql);
    $infos_util = mysql_fetch_array($req);
    if ($infos_util) {
        $mail = $infos_util['email'];
        $connecte = true;
    }
}