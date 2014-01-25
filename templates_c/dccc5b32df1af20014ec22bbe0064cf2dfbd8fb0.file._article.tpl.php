<?php /* Smarty version Smarty-3.1.15, created on 2014-01-24 14:25:32
         compiled from "partial/_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18619849552e269cc6c1223-12507690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dccc5b32df1af20014ec22bbe0064cf2dfbd8fb0' => 
    array (
      0 => 'partial/_article.tpl',
      1 => 1390565589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18619849552e269cc6c1223-12507690',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article' => 0,
    'connecte' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52e269cca37cd0_08314950',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e269cca37cd0_08314950')) {function content_52e269cca37cd0_08314950($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/homez.798/anaiscou/www/blogphp/tpl/plugins/modifier.date_format.php';
?><h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['titre'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
<h5>écrit le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['date'],"%d/%m/%Y");?>
</h5>
<?php if ($_smarty_tpl->tpl_vars['article']->value['nom']) {?>
   <h6>Tag: <?php echo $_smarty_tpl->tpl_vars['article']->value['nom'];?>
</h6>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
    <img src="<?php echo $_smarty_tpl->tpl_vars['article']->value['image'];?>
" width="200"/>
<?php }?>
<p><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['texte'], ENT_QUOTES, 'UTF-8', true));?>
</p>
<?php if ($_smarty_tpl->tpl_vars['connecte']->value) {?>
    <a href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-primary">Modifier</a>
    <a href="supprimer_article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
?<?php ?>>" class="btn btn-primary">Supprimer</a>
<?php }?><?php }} ?>
