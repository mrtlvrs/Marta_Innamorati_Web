<?php
/* Smarty version 5.7.0, created on 2026-01-24 15:05:33
  from 'file:register.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6974d1ad86e531_91065641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc660b3cebb16ed6c2893023736c94d59c161e70' => 
    array (
      0 => 'register.tpl',
      1 => 1769263531,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6974d1ad86e531_91065641 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20573187196974d1ad864924_20572265', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_20573187196974d1ad864924_20572265 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>


<section class="register">

    <h2>Registrazione</h2>

    <?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
        <p class="error"><?php echo $_smarty_tpl->getValue('error');?>
</p>
    <?php }?>

    <form method="POST" action="<?php echo BASE_URL;?>
/register">

        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Registrati</button>
    </form>

    <p>
        Hai già un account?
        <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/login">Accedi</a>
    </p>

</section>

<?php
}
}
/* {/block "content"} */
}
