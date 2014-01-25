<?php
include('includes/connexion.inc.php');
include('includes/fonctions.inc.php');

//si l'utilisateur est connecté
if ($connecte) {

    //si on a un id passé en POST
    $id = var_post('id');
    //si on a un titre c'est une modification
    if ((isset($_POST['titre'])) && $_POST['titre']) {
        //on fait un
        //mysql_real_escape_string permet d'éviter les injections SQL
        $titre = mysql_real_escape_string($_POST['titre']);
        $texte = mysql_real_escape_string($_POST['texte']);
        /* ************** On recupere la valeur du tag en minuscule*************** */
        $tag = strtolower(var_post('tag'));
        //si $id est instancié
        if ($id) {
            //si $tag existe
            if ($tag) {
                /* ************** Ajout ou suppression du Tag *************** */
                $ajout_tag = true;
                //on verifie son existance dans la table
                $sql_verif_tag = "SELECT id FROM tags WHERE nom LIKE '$tag'";
                $exec_verif_tag = mysql_query($sql_verif_tag);
                //s'il existe dejà dans la base de données
                if (mysql_num_rows($exec_verif_tag) > 0) {
                    //on le compare avec celui de la table article
                    //on recupere donc l'id du tag entré
                    $data = mysql_fetch_array($exec_verif_tag);
                    $id_tag = $data['id'];
                    //on recherche dans la table article, l'article correspondant avec le nouveau
                    $sql_corresp_tag = "SELECT * FROM articles WHERE id=$id AND id_tag=$id_tag";
                    $exec_corresp_tag = mysql_query($sql_corresp_tag);
                    //s'il n'y a pas de correspondance
                    echo "le meme qu'avant si >0";
                    echo mysql_num_rows($exec_corresp_tag);
                    if (mysql_num_rows($exec_corresp_tag) == 0) {
                        //on recupere l'id de l'ancien tag
                        $select_id_tag = "SELECT id_tag FROM articles WHERE id=$id";
                        $exec_sit = mysql_query($select_id_tag);
                        $id_tag_bdd = mysql_fetch_array($exec_sit);
                        //et on supprime celui de l'article
                        supprimer_tag($id_tag_bdd['id_tag']);
                    } else {
                        //sinon rien est a changer
                        $ajout_tag = false;
                    }
                }
                //s'il faut ajouter le tag
                if ($ajout_tag) {
                    $id_tag = ajout_tag($tag);
                    $sql = "UPDATE articles SET titre='$titre', texte='$texte', id_tag=$id_tag WHERE id=$id";
                } else {
                    //sinon il faut juste mettre a jour le texte et le titre
                    $sql = "UPDATE articles SET titre='$titre', texte='$texte' WHERE id=$id";
                }
            } else {
                /* ************** On verifie tout de même s'il y a un Tag *************** */
                //s'il n'y a pas de tag, il se peut qu'il y en avait avant
                $verif_tag = "SELECT id_tag FROM articles WHERE id=$id";
                $query_verif = mysql_query($verif_tag);
                $data_verif = mysql_fetch_array($query_verif);
                //si on a un resultat on doit supprimer l'ancien tag
                if ($data_verif['id_tag'] > 0) {
                    supprimer_tag($data_verif['id_tag']);
                }
                //puis on met à jour le titre, le texte et on passe l'id du tag à 0
                $sql = "UPDATE articles SET titre='$titre', texte='$texte',id_tag=0 WHERE id=$id";
                /* **************************************************************** */
            }
            $_SESSION['article'] = 'article modifié';
        } else {
            //sinon c'est un ajout
            //si $tag existe 
            if ($tag) {
                $id_tag = ajout_tag($tag);
                //on enregistre l'id du tag dans l'enregistrement de l'article
                $sql = "INSERT INTO articles (titre, texte,date,id_tag) VALUES ('$titre','$texte',UNIX_TIMESTAMP(),'$id_tag')";
            } else {
                //on enregistre simplement l'article
                $sql = "INSERT INTO articles (titre, texte,date) VALUES ('$titre','$texte',UNIX_TIMESTAMP())";
            }
            $_SESSION['article'] = 'ajouté';
        }
        //on execute la requete
        $exec = mysql_query($sql);
        //si $id n'est pas instancié
        if (!$id) {
            //on recupere le dernier id utilisé
            $id = mysql_insert_id();
        }
        //on recupere le fichier en le renommant
        move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/$id.jpg");
        //on redirige vers index
        header("Location: index.php");
        exit();
    } else {
        //sinon on affiche le formulaire
        include('includes/haut.inc.php');
        //on initialise les variable en cas d'ajout
        $texte = '';
        $titre = '';
        $action = 'Ajouter';
        $titre_page = 'Rédiger un article';
        $nom = '';
        //si on a un id
        if ((isset($_GET['id'])) && $_GET['id']) {
            $id = (int) $_GET['id']; //conversion de l'id en int car int est un entier pour eviter de mettre mysql_real_escape_string
            /* ************** on recupere les differentes informations de l'article dont le Tag *************** */
            $sql = "SELECT articles.*, tags.nom FROM articles LEFT JOIN tags ON articles.id_tag = tags.id WHERE articles.id=$id";
            /* **************************************************************** */
            $exec = mysql_query($sql);
            if ($data = mysql_fetch_assoc($exec)) {
                //on insere dans les precedentes variables
                extract($data);
                $titre_page = 'Modifier un article';
                $action = 'Modifier';
            }
        }
        //affichage du formulaire
        ?>
        <h2><?= $titre_page ?></h2>
        <form action="article.php" id="form_a" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $id ?>"/>

            <div class="clearfix">
                <label for="titre">Titre</label>
                <div class="input"><input type="text" name="titre" id="titre" value="<?= $titre ?>"/></div>
            </div>
            <!------------- Champ pour le Tag ------------------->
            <div class="clearfix">
                <label for="titre">Tag</label>
                <div class="input"><input type="text" name="tag" id="tag" value="<?= $nom ?>"/></div>
            </div>
            <!--------------------------------------------------->
            <div class="clearfix">
                <label for="image">Image</label>
                <input type="file" name="image" value="img/<?= $id ?>.jpg"/>
            </div>
            <div class="clearfix">
                <label for="texte">Texte</label>
                <div class="input"><textarea name="texte" id="texte" ><?= $texte ?></textarea></div>
            </div>
            <div class='form-actions'>
                <input type="submit" value="<?= $action ?>" class="btn btn-primary"/>
            </div>

        </form>
        <script text="text/javascript">
            $(function() {
                //si le formulaire est soumis
                $("#form_a").submit(function() {
                    $erreur = false;
                    $champs = '';
                    //si le champ titre n'est pas completé
                    if ($("#titre").val() == '') {
                        //console.log("Il manque le titre !");
                        //on indique qu'il y a une erreur
                        $erreur = true;
                        //on indique quelle erreur
                        $champs = "Titre ";
                    }
                    //si le champ texte n'est pas completé
                    if ($("#texte").val() == '') {
                        //console.log("Il manque le texte !");
                        //on indique qu'il y a une erreur
                        $erreur = true;
                        //on indique quelle erreur
                        $champs = $champs + "Texte";
                    }
                    //si des erreurs ont été detecté
                    if ($erreur == true) {
                        //on change la classe de notif en erreur
                        $("#notif").removeClass();
                        $("#notif").addClass("alert alert-error");
                        //on affiche l'erreur
                        $("#notif>p").html("Veuillez entrez les informations manquantes : " + $champs);
                        $("#notif").slideDown(300);
                        return false;
                    }
                    else
                        return true;
                });
            });
        </script>

        <?php
        include('includes/bas.inc.php');
    }
} else {
    //on redirige vers la page de connexion
    $_SESSION['connexion'] = 'pas accès';
    header("Location:connexion.php");
}
?>
