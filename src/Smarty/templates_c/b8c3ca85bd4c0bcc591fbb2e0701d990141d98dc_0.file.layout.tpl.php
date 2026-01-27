<?php
/* Smarty version 4.5.6, created on 2026-01-26 17:01:00
  from '/Applications/XAMPP/xamppfiles/htdocs/crochethub/src/Smarty/templates/layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69778fbc135c46_24140490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8c3ca85bd4c0bcc591fbb2e0701d990141d98dc' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/crochethub/src/Smarty/templates/layout.tpl',
      1 => 1768900286,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:sidebar.tpl' => 1,
  ),
),false)) {
function content_69778fbc135c46_24140490 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['title']->value ?? null)===null||$tmp==='' ? "CrochetHub" ?? null : $tmp);?>
</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/css/main.css">  
</head>

<body class="is-preload">

<div id="wrapper">

    <!-- MAIN -->
    <div id="main">
        <div class="inner">

            <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_106964245469778fbc1331d0_99548406', "content");
?>


        </div>
    </div>

    <!-- SIDEBAR -->
    <?php $_smarty_tpl->_subTemplateRender("file:sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>

<?php echo '<script'; ?>
>
    window.BASE_URL = "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
";
<?php echo '</script'; ?>
>


<!-- JS -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/js/browser.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/js/breakpoints.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/js/util.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/js/main.js"><?php echo '</script'; ?>
>

<!-- JS specifici della pagina -->
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_122340692269778fbc134ff7_51473963', "scripts");
?>


</body>
</html><?php }
/* {block "content"} */
class Block_106964245469778fbc1331d0_99548406 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_106964245469778fbc1331d0_99548406',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
/* {block "scripts"} */
class Block_122340692269778fbc134ff7_51473963 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_122340692269778fbc134ff7_51473963',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "scripts"} */
}
