<!--Affichage du mail si l'utilisateur est connecté
     Sinon on affiche un message !-->
{if $connecte}
    <div class="alert alert-success">
        Bonjour, {$mail}
    </div>
{else}
    <div class="alert alert-info">
        Vous n'êtes pas connecté
    </div>
{/if}

<!--Affichage du nombre de resultats de la recherche 
     ou de tout les articles !-->
{if $rech}
    <h2>Resultat(s) pour la recherche: {$total}</h2>
{else}
    <h2>Nombres d'articles au total: {$total}</h2>
{/if}

<!--Affichage des articles !-->
{foreach from=$liste_articles item=article}
    {include file ='partial/_article.tpl'}
{/foreach}

<br><br>

<!--Affichage de la pagination !-->
<ul class='pagination'>
    {if $page!=1}
        <a href="index.php?r={$rech}&p={$page-1}" class='previous'><<</a>
    {/if}
    {for $i=1 to $nb_pages}
        <li><a href="index.php?r={$rech}&p={$i}">{$i}</a></li>
        {/for}

    {if $page<$nb_pages}
        <a href="index.php?r={$rech}&p={$page+1}" class="next">>></a>
    {/if}
</ul>