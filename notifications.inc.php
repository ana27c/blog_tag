<?php
//croix pour cacher la noifications
$croix = "<a href='#' class='cacher_notif'>&times;</a>";
//si il y a une session article
if (isset($_SESSION['article'])) {
    //en fonction de la variable contenu dans la session on affiche un message
    switch ($_SESSION['article']) {
        case 'ajouté':
            //dans le cas d'un ajout, on affiche
            ?>
            <div class="alert alert-success" id='notif'>
                <?php echo $croix . "Article ajouté avec succès"; ?>
            </div>
            <?php
            break;
        case 'modifié';
            //dans le cas d'une modification, on affiche
            ?>
            <div class="alert alert-success" id='notif'>
                <?php echo $croix . "Article modifié avec succès"; ?>
            </div>
            <?php
            break;
        case 'supprimé':
            //dans le cas d'une suppression, on affiche
            ?>
            <div class="alert alert-success" id='notif'>
                <?php echo $croix . "Article correctement supprimé"; ?>
            </div>
            <?php
            break;
        case 'erreur':
            //dans le cas d'une erreur, on affiche
            ?>
            <div class="alert alert-error" id='notif'>
                <?php echo $croix . "Un probleme est survenu"; ?>
            </div>
            <?php
            break;
        default:
            ?><div class="alert alert-info" id='notif'>
                <?php echo $croix . $_SESSION['article']; ?>
            </div>
        <?php
    }
    //on detruit la variable article
    unset($_SESSION['article']);
} else {
    //sinon on affiche la notification cachée
    echo "<div class='alert alert-error hide' id='notif'>" . $croix . "<p></p></div>";
}