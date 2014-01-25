<?php
include('includes/connexion.inc.php');
include('includes/fonctions.inc.php');
//si l'utilisateur est connecté
if ($connecte) {
    //on recupere l'id passé en get
    $id = (int) var_get('id');
    //on supprime l'article correspondant
    $id_tag = "SELECT id_tag FROM articles WHERE id = '$id'";
    $id_t = mysql_query($id_tag);
    $data = mysql_fetch_array($id_t);
    /* ************* Suppression du tag *************** */
    //on supprime le tag correspondant(on decremente de 1 le tag correspondant)
    supprimer_tag($data['id_tag']);
    /* *********************************************** */
    $sql = "DELETE FROM articles WHERE id=$id";
    $req = mysql_query($sql);
    //on affiche la notification correspondante
    requete_notif($sql, 'article', 'supprimé');

    //on redirige
    header("Location: index.php");
} else {
    //sinon on redirige vers la page index
    header('Location');
    //et on affiche une notification
    ?>
    <div class="alert alert-info">
        <?php echo "Il faut vous connecter pour acceder à cette page." ?>
    </div>
    <?php
}

