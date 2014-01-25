<?php

//fonction pour recuperer une variable en GET
function var_get($nom) {
    //retourne la valeur si la variable nom existe sinon false
    return (isset($_GET[$nom])) ? $_GET[$nom] : false;
}

//fonction pour recuperer une variable en POST
function var_post($nom) {
    return (isset($_POST[$nom])) ? $_POST[$nom] : false;
}

//fonction pour effectuer une requete puis afficher la notification correspondante
function requete_notif($req, $var_notif, $val_notif) {
    if (mysql_query($req)) {
        $_SESSION[$var_notif] = $val_notif;
    } else {
        $_SESSION[$var_notif] = 'erreur';
    }
}

/* ************* Fonctions pour manipuler les tags *************** */

//fonction qui supprime le tag correspondant à l'article supprimé
function supprimer_tag($id) {
    //requete pour mettre à jour le compteur de tag dans la table tag
    $sql = "UPDATE tags SET compteur = compteur-1 WHERE id LIKE '$id'";
    //requete pour supprimer le champ si le compteur est à 0
    $supp = "DELETE FROM tags WHERE compteur = 0";
    $exec = mysql_query($sql);
    $exec = mysql_query($supp);
}

//fonction pour ajouter un tag
function ajout_tag($tag) {
    //on verifie si le tag existe dejà dans la base
    $select_tag = "SELECT id FROM tags WHERE nom LIKE '$tag'";
    $req = mysql_query($select_tag);
    //si il existe on ajoute 1 au compteur
    if (mysql_num_rows($req) > 0) {
        $data = mysql_fetch_array($req);
        //on recupere l'id du tag
        $id_tag = $data['id'];
        $sql_tag = "UPDATE tags SET compteur = compteur+1 WHERE nom LIKE '$tag'";
        $ajout = mysql_query($sql_tag);
    }
    //sinon on insere un nouveau tag
    else {
        $sql_tag = "INSERT INTO tags VALUES('','$tag',1)";
        //on recupere l'id du tag
        $ajout = mysql_query($sql_tag);
        $req = mysql_query($select_tag);
        $data = mysql_fetch_array($req);
        $id_tag = $data['id'];
    }
    //on retourne l'id du tag pour l'inserer dans la table article
    return $id_tag;
}

/* ********************************************************** */