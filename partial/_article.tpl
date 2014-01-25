<!-- Affichage de l'article -->

<!-- Affichage du titre et de la date de l'article -->
<h3>{$article.titre|escape}</h3>
<h5>écrit le {$article.date|date_format:"%d/%m/%Y"}</h5>

<!------------- Affichage du tag s'il y en a ------------------->
{if $article.nom}
   <h6>Tag: {$article.nom}</h6>
{/if}
<!--------------------------------------------------->

<!-- Affichage de l'image s'il y en a une -->
{if $article.image}
    <img src="{$article.image}" width="200"/>
{/if}

<!-- Affichage du contenu de l'article -->
<!-- nl2br sert à avoir des retour à la ligne -->
<p>{$article.texte|escape|nl2br}</p>

<!-- Si l'utilisateur est connecté on affiche les boutons de modification et de suppression -->
{if $connecte}
    <a href="article.php?id={$article.id}" class="btn btn-primary">Modifier</a>
    <a href="supprimer_article.php?id={$article.id}?>" class="btn btn-primary">Supprimer</a>
{/if}