<?php /* Smarty version Smarty-3.1.15, created on 2014-01-25 11:34:15
         compiled from "partial\_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10029529347327646e2-24439782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd04cc5aeccd577750f80fab81c6b1ff1157aefb7' => 
    array (
      0 => 'partial\\_article.tpl',
      1 => 1390645951,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10029529347327646e2-24439782',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_529347328af551_12217233',
  'variables' => 
  array (
    'article' => 0,
    'connecte' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529347328af551_12217233')) {function content_529347328af551_12217233($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\wamp\\www\\blogphp\\tpl\\plugins\\modifier.date_format.php';
?><!-- Affichage de l'article -->

<!-- Affichage du titre et de la date de l'article -->
<h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['titre'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
<h5>écrit le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['date'],"%d/%m/%Y");?>
</h5>

<!------------- Affichage du tag s'il y en a ------------------->
<?php if ($_smarty_tpl->tpl_vars['article']->value['nom']) {?>
   <h6>Tag: <?php echo $_smarty_tpl->tpl_vars['article']->value['nom'];?>
</h6>
<?php }?>
<!--------------------------------------------------->

<!-- Affichage de l'image s'il y en a une -->
<?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
    <img src="<?php echo $_smarty_tpl->tpl_vars['article']->value['image'];?>
" width="200"/>
<?php }?>

<!-- Affichage du contenu de l'article -->
<!-- nl2br sert à avoir des retour à la ligne -->
<p><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['texte'], ENT_QUOTES, 'UTF-8', true));?>
</p>

<!-- Si l'utilisateur est connecté on affiche les boutons de modification et de suppression -->
<?php if ($_smarty_tpl->tpl_vars['connecte']->value) {?>
    <a href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-primary">Modifier</a>
    <a href="supprimer_article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
?<?php ?>>" class="btn btn-primary">Supprimer</a>
<?php }?><?php }} ?>
