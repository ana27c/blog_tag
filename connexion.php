<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');
include('includes/fonctions.inc.php');
//si le mail et le mdp sont envoyés
if (var_post('email') && var_post('mdp')) {
    //on protege les deux variables
    $email = mysql_real_escape_string($_POST['email']);
    $mdp = mysql_real_escape_string($_POST['mdp']);
    //on recherche dans la table les informations correspondantes
    $sql = "SELECT id,email FROM utilisateurs WHERE email='$email' AND mdp='$mdp'";
    $req = mysql_query($sql);
    //echo mysql_error();
    $data = mysql_fetch_array($req);
    //si on a un mail
    if ($data['email']) {
        //connexion reussi
        $id = mysql_real_escape_string($data['id']);
        $mail = mysql_real_escape_string($data['email']);
        //on crée le sid pour cette session en concatnenant le mail et la date actuelle
        $sid = md5($data['email'] . time());
        //on met a jour le sid
        $sql = "UPDATE utilisateurs SET sid='$sid' WHERE id='$id'";
        $req = mysql_query($sql);
        //on crée le cookie
        setcookie('sid', $sid, time() + 3600);
        setcookie('mail', $mail, time() + 3600);
        //on renvoie sur index
        header('location: index.php');
    } else {
        //sinon il n'y a pas de concordance
        echo "
       <div class='alert alert-error'>
		Votre mail ou mot de passe est invalide
	</div>";
    }
}
//formulaire de connexion
?>
<h2>Connexion</h2>

<p>Saisissez les identifiants choisis lors de votre inscription</p>

<form action="connexion.php" method="post" id="form_connexion">
    <fieldset>
        <div class="clearfix">
            <label for="email">Email</label>
            <div class="input"><input id="email" name="email" size="30" type="email" value=""/></div>
        </div>
        <div class="clearfix">
            <label for="mdp">Mot de passe</label>
            <div class="input"><input id="mdp" name="mdp" size="15" type="password" value=""/></div>
        </div>
        <div class="form-actions">
            <input class="btn btn-large btn-primary" id="submit" type="submit" value="se connecter"/>
        </div>
    </fieldset>
</form>

<?php
include('includes/bas.inc.php');
?>