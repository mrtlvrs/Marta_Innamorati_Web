<?php
/* Smarty version 5.7.0, created on 2026-01-20 10:14:00
  from 'file:layout.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_696f475813a0f5_95866472',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5c73e5913a1f48989bc40573dd08dbc9c08193e' => 
    array (
      0 => 'layout.tpl',
      1 => 1768900286,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:sidebar.tpl' => 1,
  ),
))) {
function content_696f475813a0f5_95866472 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <title><?php echo (($tmp = $_smarty_tpl->getValue('title') ?? null)===null||$tmp==='' ? "CrochetHub" ?? null : $tmp);?>
</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/css/main.css">  
</head>

<body class="is-preload">

<div id="wrapper">

    <!-- MAIN -->
    <div id="main">
        <div class="inner">

            <?php $_smarty_tpl->renderSubTemplate("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

            <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1923387749696f4758136887_63870503', "content");
?>


        </div>
    </div>

    <!-- SIDEBAR -->
    <?php $_smarty_tpl->renderSubTemplate("file:sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

</div>

<?php echo '<script'; ?>
>
    window.BASE_URL = "<?php echo $_smarty_tpl->getValue('BASE_URL');?>
";
<?php echo '</script'; ?>
>


<!-- JS -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/js/browser.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/js/breakpoints.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/js/util.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/js/main.js"><?php echo '</script'; ?>
>

<!-- JS specifici della pagina -->
<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2038550552696f4758139b47_60151622', "scripts");
?>


</body>
</html><?php }
/* {block "content"} */
class Block_1923387749696f4758136887_63870503 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
}
}
/* {/block "content"} */
/* {block "scripts"} */
class Block_2038550552696f4758139b47_60151622 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
}
}
/* {/block "scripts"} */
}
