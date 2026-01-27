<?php
/* Smarty version 4.5.6, created on 2026-01-25 22:52:20
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69769094581ac0_98026002',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '634ed99a422684e889f68d0f22e7fdb19aea25ed' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/layout.tpl',
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
function content_69769094581ac0_98026002 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_160903870697690945802d1_46108365', "content");
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_122868979969769094581625_10833032', "scripts");
?>


</body>
</html><?php }
/* {block "content"} */
class Block_160903870697690945802d1_46108365 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_160903870697690945802d1_46108365',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
/* {block "scripts"} */
class Block_122868979969769094581625_10833032 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_122868979969769094581625_10833032',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "scripts"} */
}
