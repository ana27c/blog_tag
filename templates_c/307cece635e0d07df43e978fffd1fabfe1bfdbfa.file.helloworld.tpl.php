<?php /* Smarty version Smarty-3.1.15, created on 2013-11-18 13:51:30
         compiled from "helloworld.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17908528a0d5222edf0-71068616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '307cece635e0d07df43e978fffd1fabfe1bfdbfa' => 
    array (
      0 => 'helloworld.tpl',
      1 => 1384778845,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17908528a0d5222edf0-71068616',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'world' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_528a0d5228f419_36013929',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a0d5228f419_36013929')) {function content_528a0d5228f419_36013929($_smarty_tpl) {?><html>
<body>
<p>
	Hello <?php echo $_smarty_tpl->tpl_vars['world']->value;?>

</p>
</body><?php }} ?>
