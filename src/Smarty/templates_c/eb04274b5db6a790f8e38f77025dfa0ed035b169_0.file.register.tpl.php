<?php
/* Smarty version 4.5.6, created on 2026-01-26 10:21:14
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_6977320ab39776_13391994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb04274b5db6a790f8e38f77025dfa0ed035b169' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/register.tpl',
      1 => 1769263531,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6977320ab39776_13391994 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11153995216977320ab2cf02_50774843', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_11153995216977320ab2cf02_50774843 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11153995216977320ab2cf02_50774843',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<section class="register">

    <h2>Registrazione</h2>

    <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
        <p class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
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
        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/login">Accedi</a>
    </p>

</section>

<?php
}
}
/* {/block "content"} */
}
