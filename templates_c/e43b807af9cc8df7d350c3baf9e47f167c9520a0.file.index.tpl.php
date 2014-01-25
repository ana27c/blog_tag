<?php /* Smarty version Smarty-3.1.15, created on 2014-01-25 11:34:14
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26715528a164b442388-58844844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e43b807af9cc8df7d350c3baf9e47f167c9520a0' => 
    array (
      0 => 'index.tpl',
      1 => 1390645307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26715528a164b442388-58844844',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_528a164b528158_86422403',
  'variables' => 
  array (
    'connecte' => 0,
    'mail' => 0,
    'rech' => 0,
    'total' => 0,
    'liste_articles' => 0,
    'page' => 0,
    'nb_pages' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a164b528158_86422403')) {function content_528a164b528158_86422403($_smarty_tpl) {?><!--Affichage du mail si l'utilisateur est connecté
     Sinon on affiche un message !-->
<?php if ($_smarty_tpl->tpl_vars['connecte']->value) {?>
    <div class="alert alert-success">
        Bonjour, <?php echo $_smarty_tpl->tpl_vars['mail']->value;?>

    </div>
<?php } else { ?>
    <div class="alert alert-info">
        Vous n'êtes pas connecté
    </div>
<?php }?>

<!--Affichage du nombre de resultats de la recherche 
     ou de tout les articles !-->
<?php if ($_smarty_tpl->tpl_vars['rech']->value) {?>
    <h2>Resultat(s) pour la recherche: <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</h2>
<?php } else { ?>
    <h2>Nombres d'articles au total: <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</h2>
<?php }?>

<!--Affichage des articles !-->
<?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['liste_articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
    <?php echo $_smarty_tpl->getSubTemplate ('partial/_article.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } ?>

<br><br>

<!--Affichage de la pagination !-->
<ul class='pagination'>
    <?php if ($_smarty_tpl->tpl_vars['page']->value!=1) {?>
        <a href="index.php?r=<?php echo $_smarty_tpl->tpl_vars['rech']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
" class='previous'><<</a>
    <?php }?>
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nb_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
        <li><a href="index.php?r=<?php echo $_smarty_tpl->tpl_vars['rech']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
        <?php }} ?>

    <?php if ($_smarty_tpl->tpl_vars['page']->value<$_smarty_tpl->tpl_vars['nb_pages']->value) {?>
        <a href="index.php?r=<?php echo $_smarty_tpl->tpl_vars['rech']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
" class="next">>></a>
    <?php }?>
</ul><?php }} ?>
