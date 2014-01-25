<?php /* Smarty version Smarty-3.1.15, created on 2013-11-18 14:29:10
         compiled from "index.php" */ ?>
<?php /*%%SmartyHeaderCode:18444528a15657a94b1-88042551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb6499b8e938f92a3695fff1afe57edea4b9efb7' => 
    array (
      0 => 'index.php',
      1 => 1384781345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18444528a15657a94b1-88042551',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_528a15657ecb22_46654614',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a15657ecb22_46654614')) {function content_528a15657ecb22_46654614($_smarty_tpl) {?><<?php ?>?php
	require("tpl/Smarty.class.php");
	
	/*include('includes/connexion.inc.php');
	include('includes/haut.inc.php');
	include('includes/fonctions.inc.php');*/
	
	$tpl=new Smarty();
	//connexion bdd
	$bdd = new PDO('mysql:host=localhost;dbname=blog','root','');
	//preparation requete
	$req = $bdd->prepare("SELECT * FROM articles ORDER BY date DESC");
	$req -> execute();
	
	$liste_articles = array();
	$i = 0;
	
	//recuperation dans un tableau
	while($data =$req->fetch()){
		$liste_articles[$i]['id']=$data['id'];
		$liste_articles[$i]['date']=$data['date'];
		$liste_articles[$i]['titre']=$data['titre'];
		$liste_articles[$i]['texte']=$data['texte'];
		$i++;
	}
	
	$tpl -> assign('liste_articles',$liste_articles);
	$tpl -> display("index.php");
?<?php ?>><?php }} ?>
