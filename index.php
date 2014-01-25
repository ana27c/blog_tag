<?php

require("tpl/Smarty.class.php");

include('includes/connexion.inc.php');
include('includes/haut.inc.php');
include('includes/fonctions.inc.php');

//création de l'objet
$tpl = new Smarty();
//connexion bdd
$bdd = new PDO("mysql:host=$host;dbname=$db", $user, $mdp);

// calcul des variables pour la pagination: 
// affichage de 2 articles par pages
$app = 2;
// si une variable page est defini on recupere cette variable
// sinon on prend la valeur 1 par defaut
$page = (var_get('p')) ? var_get('p') : 1;
$debut = $app * $page - $app;

$rech = var_get('r');
//encodage de la chaine
urlencode($rech);
//si une recherche est effectuée on affiche les articles correspondants
if ($rech) {
    // on securise $rech
    $rech = mysql_real_escape_string($_GET['r']);
    //on recupere la liste d'articles
    /*     * ************** en effectuant une recherche egalement sur le tag *************** */
    $req = $bdd->prepare("SELECT articles.*, tags.nom FROM articles LEFT JOIN tags ON articles.id_tag = tags.id WHERE titre LIKE '%$rech%' OR texte LIKE '%$rech%' OR tags.nom LIKE '%$rech%' LIMIT $debut, $app");
    //on compte les resultats
    $req_count = $bdd->prepare("SELECT COUNT(*) AS total FROM articles LEFT JOIN tags ON articles.id_tag = tags.id WHERE titre LIKE '%$rech%' OR texte LIKE '%$rech%' OR tags.nom LIKE '%$rech%'");
} else {
    //sinon on affiche tout les articles
    /*     * ************** On n'oublie pas le nom du tag en utilisant une jointure *************** */
    $req = $bdd->prepare("SELECT articles.*, tags.nom FROM articles LEFT JOIN tags ON articles.id_tag = tags.id ORDER BY date DESC LIMIT $debut, $app");
    $req_count = $bdd->prepare("SELECT COUNT(*) AS total FROM articles");
}

//execution des requetes
$req->execute();
$req_count->execute();
$count = $req_count->fetch();
$total = $count['total'];

//recuperation dans un tableau
$liste_articles = array();
$i = 0;
while ($data = $req->fetch()) {
    $liste_articles[$i] = $data;
    if (file_exists("img/$data[id].jpg")) {
        $liste_articles[$i]['image'] = "img/$data[id].jpg";
    } else {
        $liste_articles[$i]['image'] = false;
    }
    $i++;
}

//calcul du nombre de pages
$nb_pages = ($total < 0) ? 1 : ceil($total / $app);

//assignation des variables
$tpl->assign('liste_articles', $liste_articles);
$tpl->assign('connecte', $connecte);
$tpl->assign('total', $total);
$tpl->assign('page', $page);
$tpl->assign('nb_pages', $nb_pages);
$tpl->assign('rech', $rech);
if ($connecte)
    $tpl->assign('mail', $mail);
$tpl->display("index.tpl");

include('includes/bas.inc.php');
?>