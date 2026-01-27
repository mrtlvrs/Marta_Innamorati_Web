<?php
/* Smarty version 5.7.0, created on 2026-01-20 10:07:48
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_696f45e458a360_13928299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2122767c6fe885c770bf974177f5ccdfa35a3127' => 
    array (
      0 => 'login.tpl',
      1 => 1768900064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696f45e458a360_13928299 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_774522733696f45e4581c58_35240610', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_774522733696f45e4581c58_35240610 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>


<section class="login">

    <h2>Login</h2>

    <?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
        <p class="error"><?php echo $_smarty_tpl->getValue('error');?>
</p>
    <?php }?>

    <form method="POST" action="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/login">

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Accedi</button>
    </form>

    <p>
        Non hai un account?
        <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/register">Registrati</a>
    </p>

</section>

<?php
}
}
/* {/block "content"} */
}
