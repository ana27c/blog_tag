</div>
<nav class="span4">
    <h2>Menu</h2>
    <!-- Formulaire de recherche -->
    <form action="index.php" method="get"></br>
        <label for="r">Recherche :</label>
        <input type="text" name="r" placeholder="Framework, ..." value="<?= var_get('r') ?>" class="span3">&nbsp;
        <input type="submit" value="OK" class="btn">
    </form>
    <!-- Menu -->
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <?php
        //si l'utilisateur est connecté il peut rediger un article et se deconnecer
        if ($connecte) {
            ?>
            <li><a href="article.php">Rédiger un article</a></li>
            <li><a href="deconnexion.php">Se deconnecter</a></li>
            <?php
            //sinon il ne peut que se connecter
        } else {
            ?>
            <li><a href="connexion.php">Se connecter</a></li>
        <?php }
        ?>

    </ul>

</nav>
</div>

</div>

<footer>
    <script text="text/javascript">
        $(function() {
            //lors du clic sur la croix, on appelle la fonction cacher_notif
            $(".cacher_notif").click(cacher_notif);
            //au bout de 2 secondes, on appelle la fonction cacher_notif
            setTimeout(cacher_notif, 2000);

            //permet de cacher la norification en effectuant un glissement
            function cacher_notif() {
                $("#notif").slideUp("slow");
            }
            ;
        });
    </script>
    <p>&copy; Nilsine & Courrier Anais 2014</p>
</footer>
</div>
</body>
</html>